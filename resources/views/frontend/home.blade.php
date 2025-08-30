@extends('frontend.layout.master')
@section('content')
    

    <!--===========================
        HERO SECTION START
    ============================-->

    @include('frontend.sections.hero-section')
    <!--===========================
       HERO SECTION END
    ============================-->



        <!--===========================
        FEATURES SECTION START
    ============================-->

    @include('frontend.sections.features-section')
    <!--===========================
       FEATURES SECTION END
    ============================-->




    

    <!--===========================
        CATEGORY 4 START
    ============================-->
        @include('frontend.sections.category')

    <!--===========================
        CATEGORY 4 END
    ============================-->


  
    <!--===========================
        ABOUT 3 START
    ============================-->
        @include('frontend.sections.about')

    <!--===========================
        ABOUT 3 END
    ============================-->

      


    <!--===========================
        COUESES 3 START
    ============================-->
        @include('frontend.sections.courses')

    <!--===========================
        COUESES 3 END
    ============================-->


    

   
    <!--===========================
        OFFER START
    ============================-->
      @include('frontend.sections.offer')

    <!--===========================
        OFFER END
    ============================-->


    
    <!--===========================
        BECOME INSTRUCTOR START
    ============================-->
     @include('frontend.sections.become-instructor')
 
    <!--===========================
        BECOME INSTRUCTOR END
    ============================-->


     
    <!--===========================
        VIDEO START
    ============================-->

       @include('frontend.sections.video')
    <!--===========================
        VIDEO END
    ============================-->


    <!--===========================
        BRAND START
    ============================-->
           @include('frontend.sections.brand')

    <!--===========================
        BRAND END
    ============================-->


    <!--===========================
        QUALITY COURSES START
    ============================-->
      {{-- 
       @include('frontend.sections.quality-course')
      --}}
 
    <!--===========================
        QUALITY COURSES END
    ============================-->


    <!--===========================
        TESTIMONIAL START
    ============================-->
       @include('frontend.sections.testimonial')
 
    <!--===========================
        TESTIMONIAL END
    ============================-->


    <!--===========================
        BLOG 4 START
    ============================-->
    {{-- 
      @include('frontend.sections.blog') 
      --}}

    <!--===========================
        BLOG 4 END
    ============================-->
        {{-- 
    --}}
@endsection