<?php

namespace App\DataFixtures\ORM;

use App\Model\ImageInterface;
use App\Model\RecipeInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Loader\NativeLoader;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Class AppFixtures
 * @package App\DataFixtures\ORM
 */
class FixturesLoader extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $dir = __DIR__ . '/../../Resources/fixtures/dev/';
        try {
            $loader    = new NativeLoader();
            $objectSet = $loader->loadFile($dir . 'fixtures.yml');
            $this->clearUploadedImgDir(__DIR__ . '/../../../public/uploads/img/' );
            foreach ($objectSet->getObjects() as $object) {
                if ($object instanceof ImageInterface) {
                    $this->processImg($object);
                }
                if ($object instanceof RecipeInterface){
                    $this->processHtml($object);
                }
                $manager->persist($object);
            }
            $manager->flush();
        } catch (\Exception $e) {
            var_dump($e);
            exit;
        }
    }

    protected function processImg(ImageInterface $image)
    {
        $imgName = $image->getTempFileName();
        $exp     = explode('.', $imgName);
        $ext     = array_pop($exp);
        $image->setAlt($imgName);
        $newName = $this->saveTmpContent(file_get_contents(__DIR__ . '/../images/' . $imgName), $ext);

        $image->setFile(new File($newName));
    }

    protected function processHtml(RecipeInterface $recipe)
    {
        $recipeName = $recipe->getSlug();
        $content = file_get_contents(__DIR__ . '/../html/' . $recipeName.'.html');
        $recipe->setDescription($content);
    }

    /**
     * @param string $content
     * @param        $ext
     *
     * @return string
     */
    public function saveTmpContent(string $content, $ext): string
    {
        $tmpfname = tempnam("/tmp", "recipe_");
        $handle   = fopen($tmpfname, "w");
        fwrite($handle, $content);
        $metaDatas = stream_get_meta_data($handle);
        $newName   = $metaDatas['uri'] . '.' . $ext;
        rename($tmpfname, $newName);
        return $newName;
    }

    /**
     * @param string $folder
     */
    public function clearUploadedImgDir(string $folder)
    {
        $files = glob($folder . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }
}
