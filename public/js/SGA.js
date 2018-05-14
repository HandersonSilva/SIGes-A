
//Start page
$(document).ready(function(){//inicio de carregamento do js

  //Validação do formulario de contato home

  $(function(){

    $('#frmContato').validate({
      rules:{
        nome_contatoN:{
          required:true
        },
        tel_contatoN:{
          required:true,
          minlength:15
        },
        email_contatoN:{
          required:true,
          email:true
        },
        textAreaContatoN:{
          required:true,
          maxlength:150
        }
      },
      messages:{
        nome_contatoN:{
          required:"&nbsp &nbsp &nbsp &nbsp &nbsp &nbspError-> Informe seu nome."
        },
        tel_contatoN:{
          required:"&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbspError-> Telefone é obrigatório.",
          minlength:"&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbspError-> Mínimo 11 números."

        },
        email_contatoN:{
          required:"&nbsp &nbsp &nbsp &nbsp &nbsp &nbspError-> Informe seu email.",
          email:"&nbsp &nbsp &nbsp &nbsp &nbsp &nbspError-> Informe um email válido."

        },
        textAreaContatoN:{
          required:"&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbspError-> Importante que coloque sua mensagem,para que possamos ajudá-lo.",
          maxlength:"&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbspError-> Reduza sua mensagem para 150 caracteres."
        }
      }
    });
   //fazer a contagem de caracteres $('#textAreaContato').characterCounter();

  })

  function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime( d.getTime() + (exdays * 24 * 60 * 60 * 1000) );

    var expires = 'expires=' + d.toUTCString();
    document.cookie = cname + '=' + cvalue + '; ' + expires;
  }

  function getCookie(cname) {
    var name = cname + '=';
    var ca = document.cookie.split(';');

    for( var i = 0; i < ca.length; i++ ) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }

    return '';
}


    function exibeModal(){

      var flag_alert = getCookie("modal_cookie");

      // Se o cookie não existe -> o usuário nunca viu o alerta
      if ( flag_alert == '' ) {
          $('#modal').modal('open');

          // Seta um cookie com duração de 10 dias
          setCookie("modal_cookie", true, 10);
      }

    }

    window.onload = function(){
        exibeModal();
      }


    $('.responsive').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      prevArrow: '<button class="slick-prev btn-primary" aria-label="Previous" type="button">Previous</button>',
      nextArrow: '<button class="slick-next" aria-label="Next" type="button">Next</button>',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });

    $('.carousel').carousel();
    //ativar button marialize
    $(".button-collapse").sideNav();

    //slide
    $('.slider').slider();

    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
    $('.scrollspy').scrollSpy( function(id) {
      return 'a[href="#' + id + '"]';
    });
    //text area
   // $('#textarea1').val();
    $('#textarea1').trigger('autoresize');
    //inicializar o select
    $('select').material_select();

    //menu structure da view teste
    $('.scrollspy').scrollSpy({
     scrollOffset: 90
    });
    //contagem caracteres
    $('textarea#sobre_curso').characterCounter();
    //code datepicker
    /*$('.datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 15, // Creates a dropdown of 15 years to control year,
      today: 'Today',
      clear: 'Clear',
      close: 'Ok',
      closeOnSelect: false // Close upon selecting a date,
    });*/

    //tradução do datepicker
    $('.datepicker').pickadate({
      labelMonthNext: 'Próximo',
      labelMonthPrev: 'Anterior',
      labelMonthSelect: 'Selecionar mês',
      labelYearSelect: 'Selecionar um ano',
      monthsFull: [ 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro' ],
      monthsShort: [ 'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez' ],
      weekdaysFull: [ 'Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado' ],
      weekdaysShort: [ 'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab' ],
      weekdaysLetter: [ 'D', 'S', 'T', 'Q', 'Q', 'S', 'S' ],
      today: 'Hoje',
      clear: 'Limpar',
      close: 'sair'
    });


    //setar foco nos cards de curso
    $(".card-title").on("click", function() {
        var divId = this.id ;
        // divId.
        var col ="#"+divId+"_div";

          //focar em ema div e  rolar ela
         $('html, body').animate({
          scrollTop:$( col).offset().top
            },1000);

    });


   //mostrar conteudo ao rolar a pagina
   // $('.scrollspy').scrollSpy();

    var options = [
      {selector: '#slide', offset:50, callback: function(el) {
        Materialize.toast("This is Topo!",1400 );
      } },
      {selector: '#cont_aluno_empresa', offset: 530, callback: function(el) {
        Materialize.toast("Aluno ou Empresa" ,1400);
      } },

      {selector: '#propaganda_home', offset: 530, callback: function(el) {
        Materialize.toast("Propaganda home", 1400 );

      } },
      {selector: '#propagandas_cursos_home', offset: 530, callback: function(el) {
        Materialize.toast("Propaganda cursos", 1400 );

      } },


    ];
    Materialize.scrollFire(options);


    $('#home_nav').click( function(){

        this.toggleClass("active");
    });

    $(document).ready(function() {
    $('input#input_text, textarea#textarea2').characterCounter();
  });

  $('#tel_contato').mask('(00) 00000-0000');


  });//fim ready
