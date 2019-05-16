<template>
  <div class="container min-vh-100">
    <app-header></app-header>

    <div class="row">
      <app-list></app-list>
      <app-recipe></app-recipe>
    </div>
  </div>
</template>

<script>
  import Header from './components/header/header'
  import List from './components/list/recipes'
  import Recipe from './components/recipe/recipe'
  import {mapActions} from 'vuex'
  import * as types from './store/types';
  export default {
    components: {
      appHeader: Header,
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