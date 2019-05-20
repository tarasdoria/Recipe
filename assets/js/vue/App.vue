<template>
  <div class="min-vh-100">
      <a href="" id="return-to-top">
          <span class="chevron-top"></span>
      </a>
    <app-header></app-header>
      <div class="body">
          <div class="body__background"></div>
          <div class="container">
              <div class="row row__body">
                  <app-list></app-list>
                  <app-recipe></app-recipe>
              </div>
          </div>
      </div>
      <app-footer></app-footer>
  </div>
</template>

<script>
  import Header from './components/header/header'
  import Footer from './components/footer/footer'
  import List from './components/list/recipes'
  import Recipe from './components/recipe/recipe'
  import {mapActions} from 'vuex'
  import * as types from './store/types';
  export default {
    components: {
      appHeader: Header,
      appFooter: Footer,
      appList: List,
      appRecipe: Recipe,
    },
    methods: {
      ...mapActions({
        'getRecipes': types.ACTION_RECIPES
    }),
    },
    mounted() {
      this.getRecipes()
    }

  }
</script>