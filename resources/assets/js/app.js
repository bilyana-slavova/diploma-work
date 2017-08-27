
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});


$(document).ready(function(){
  var ingredientId = $('.ingredient').length - 1;

  $(document).on('click', '#addIngredient', cloneIngredient);
  $(document).on('click', '.btn-remove', removeIngredient);

  $('#tagit').tokenize2({

    // max number of tags
    tokensMaxItems: 5,

    // allow you to create custom tokens
    tokensAllowCustom: false,

    // max items in the dropdown
    dropdownMaxItems: 10,

    // minimum of characters required to start searching
    searchMinLength: 3,

    // specify if Tokenize2 will search from the begining of a string
    searchFromStart: true,

    // choose if you want your search highlighted in the result dropdown
    searchHighlight: true,

    // custom delimiter
    delimiter: ',',

    // data source
    dataSource: '/ingredients/find',

    // waiting time between each search
    debounce: 500,

    // custom placeholder text
    placeholder: 'Type in ingredients',

    // enable sortable
    // requires jQuery UI
    sortable: false,

    // tabIndex
    tabIndex: 0

  });

  initIngredientAutocomplete($('.ingredient-name'));

  function initIngredientAutocomplete(elem) {

    elem.tokenize2({

      // max number of tags
      tokensMaxItems: 1,

      // allow you to create custom tokens
      tokensAllowCustom: false,

      // max items in the dropdown
      dropdownMaxItems: 10,

      // minimum of characters required to start searching
      searchMinLength: 3,

      // specify if Tokenize2 will search from the begining of a string
      searchFromStart: true,

      // choose if you want your search highlighted in the result dropdown
      searchHighlight: true,

      // custom delimiter
      delimiter: ',',

      // data source
      dataSource: '/ingredients/find',

      // waiting time between each search
      debounce: 500,

      // custom placeholder text
      placeholder: 'Type in ingredient',

      // enable sortable
      // requires jQuery UI
      sortable: false,

      // tabIndex
      tabIndex: 0

    });
  }


  $("#sidebar-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });

  function cloneIngredient(e){
    e.preventDefault();
    console.log('cloned');
    ingredientId++;

    $newIngredient = $('.ingredient').last().clone();
    $newIngredient.attr("id", "ingredient_" +  ingredientId);
    $newIngredient.find('[name]').each(function() {
      var name = $(this).attr('name');
      console.log(name);
      $(this).attr('name', name.replace(/ingredients\[\d+\]/g, `ingredients[${ingredientId}]`));
    })
    $removeIngredient = $('<a href="#" class="btn btn-remove">x</a>');
    $removeIngredient.attr('id', 'removeIngredient_' + ingredientId);
    $removeIngredient.attr('data-id', ingredientId);
    $newIngredient.find('.btn-remove').remove();
    $newIngredient.find('.form-group').first().append($removeIngredient);
    $newIngredient.find('.tokenize').remove();
    $newIngredient.find('select, input').val('');

    $newIngredient.appendTo('.ingredients');

    initIngredientAutocomplete($newIngredient.find('select[multiple]'));
  };

  function removeIngredient(e){
    e.preventDefault();
    console.log('removed');
    $currentIngredientId = $(this).attr('data-id');
    $('#ingredient_'+ $currentIngredientId).remove();
  };
});
