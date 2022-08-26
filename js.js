$(document).ready(function(){
        
    $('#menu').click(function(){
        $(this).toggleClass('fa-times');
        $('.navbar').toggleClass('nav-toggle');
    });

     
     
    $(window).on('scroll load',function(){

        $('#menu').removeClass('fa-times');
        $('.navbar').removeClass('nav-toggle');

        if($(window).scrollTop() > 68){
            $('header .header-2').addClass('header-active');
        }else{
            $('header .header-2').removeClass('header-active');
        }

        $('section').each(function(){

            let height = $(this).height();
            let offset = $(this).offset().top - 200;
            let top = $(window).scrollTop();
            let id = $(this).attr('id');

            if(top >= offset && top < offset + height){
                $('.navbar ul li a').removeClass('active');
                $('.navbar').find(`[href="#${id}"]`).addClass('active');
            }

        });

    });

    $('.home-slider').owlCarousel({
        items:1,
        nav:true,
        dots:false,
        autoplay:true,
        autoplayTimeout:8000,
        loop:true
    });

   


    
    $('.arrival .controls .btn').on("click",function(){
        var value=$(this).attr('data-filter');
        
        $.ajax({
            url:"Allproducts.php",
            type:"POST",
            data:'request='+value,
            success: function (data){
                $("#product-filter").html(data)
            },
        }) 
    });
});

