
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
  var ingredientId = 0;

  $(document).on('click', '#addIngredient', cloneIngredient);
  $(document).on('click', '.btn-remove', removeIngredient);

  $('#tagit').tagit({
    autocomplete: {
      source: '/ingredients/find',
      minLength: 3
    },
    placeholderText: 'Type your ingredient'
  });

  $("#sidebar-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });

  function cloneIngredient(e){
    e.preventDefault();
    console.log('cloned');
    ingredientId++;

    $newIngredient = $('.ingredient').first().clone();
    $newIngredient.attr("id", "ingredient_" +  ingredientId);
    $newIngredient.find('[name]').each(function() {
      var name = $(this).attr('name');
      console.log(name);
      $(this).attr('name', name.replace(/ingredients\[\d+\]/g, `ingredients[${ingredientId}]`));
    })
    $removeIngredient = $('<a href="#" class="btn btn-remove">x</a>');
    $removeIngredient.attr('id', 'removeIngredient_' + ingredientId);
    $removeIngredient.attr('data-id', ingredientId);
    $newIngredient.find('.form-group').first().append($removeIngredient);
    $newIngredient.appendTo('.ingredients');
  };

  function removeIngredient(e){
    e.preventDefault();
    console.log('removed');
    $currentIngredientId = $(this).attr('data-id');
    $('#ingredient_'+ $currentIngredientId).remove();
  };
});
