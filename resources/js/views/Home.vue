<!--suppress ALL -->
<template>
  <div>

    <jb-modal/>

    <jb-slider/>

    <div class="jb-main-section-wrapper">

      <div class="jb-section" style="position: relative">

        <div class="container">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <h1 class="t-bold t-orange t-mont">Get more done <br>hire a freelancer</h1>
              <p class="t-meri t-normal">Speed up your workflow by hiring an experienced freelancer in any
                field.
                Just post your projects and get bids from freelancers. With ranking and reps it
                makes selecting the best freelancers easier.
              </p>
              <p class="t-meri t-normal">
                We have freelancers who are experts in graphic design, web design, mobile app development,
                software development, architecture, photography and so much more. Whatever your needs, there
                will
                be a freelancer to get it done.</p>
            </div>

            <div class="col-sm-12 col-md-6">

              <div class="jb-player-wrapper">
                <div class="jb-player-overlay"></div>

                <img src="/images/play.png" class="jb-play-icon"/>
                <img src="/images/img2.jpg" class="img-fluid jb-section-img">
              </div>


            </div>

          </div>
        </div>


      </div>


      <div class="jb-section-small bg-orange">

        <div class="container">

          <div class="text-center contents">

                    <p class="t-bold  t-mont mr-md-3">Need a flexible job? Register as a freelancer</p>
                    <a href="#" class="btn bg-black t-bold t-mont ml-md-3">Register to Work</a>


          </div>

        </div>

      </div>

      <div class="jb-section jb-with-video jb-player-wrapper">

        <div class="jb-video-bg" style="background-image: url('/images/video.jpg')"></div>
        <div class="jb-player-overlay">
        </div>
        <img src="/images/play@2x.png" class="jb-play-icon2"/>


        <div class="container">

          <div class="col-md-4">

            <div class="jb-section-text t-white t-bold  t-mont">
              Post your first job
              in just a few steps.
              Its simple! Here is a walk through
            </div>
          </div>
        </div>

      </div>


      <div class="jb-section jb-projects">

        <div class="container">
          <div class="">
            <h1 class="t-bold  t-mont">Get your project started</h1>
            <br>
            <div class="row">
              <div class="col-sm-3">
                <img class="jb-projects-img" src="/images/icon.png">
                <p class="t-bold jb-project-title  t-mont">Website Development</p>
              </div>
              <div class="col-sm-3">
                <img class="jb-projects-img" src="/images/icon2.png">
                <p class="t-bold jb-project-title  t-mont">Graphic Design</p>
              </div>
              <div class="col-sm-3">
                <img class="jb-projects-img" src="/images/icon3.png">
                <p class="t-bold jb-project-title t-mont">Mobile Applications</p>
              </div>
              <div class="col-sm-3">
                <img class="jb-projects-img" src="/images/icon4.png">
                <p class="t-bold jb-project-title t-mont">Photography</p>
              </div>
            </div>
            <br>
            <a href="#" class="btn bg-black  t-bold  t-mont">View More</a>

          </div>
        </div>
      </div>


      <div class="jb-section-small bg-orange">

        <div class="container">

          <div class="text-center contents">
              <p class="t-bold t-mont mr-md-3">Convinced? Hire a freelancer</p>
              <a href="#" class="btn bg-black t-bold t-mont ml-md-3">Hire</a>
          </div>

        </div>

      </div>

      <div class="jb-section jb-quote-background">

        <div class="container">
          <div class="row">
            <div class="col-md-12 jb-quote-wrapper">

              <div class="jb-bg-overlay">

              </div>


              <transition name="fade" mode="out-in">
                <jb-quote v-on:mouseout.native="startRotation" v-on:mouseover.native="stopRotation"
                          :key="currentQuoteNumber">


                  <h4 class="t-bold  t-mont jb-quote-title" slot="title">{{quotes[currentQuoteNumber].title}}</h4>
                  <p class="t-normal t-meri col-md-10 p-0" slot="contents">
                    {{quotes[currentQuoteNumber].text}}
                  </p>
                  <p class="jb-quote-name t-meri" slot="author" style="white-space: pre-line">
                    {{quotes[currentQuoteNumber].author}}
                    {{quotes[currentQuoteNumber].authorPosition}}</p>


                </jb-quote>
              </transition>


              <div class="jb-quote-btn-wrapper">
                <div class="jb-quote-btn left" @click.prevent="showPreviousQuote"><i class="fa fa-chevron-left"></i>
                </div>
                <div class="jb-quote-btn right" @click.prevent="showNextQuote"><i class="fa fa-chevron-right"></i>
                </div>
              </div>

            </div>

          </div>


        </div>


      </div>


    </div>

  </div>
</template>

<script>

  import Slider from '../components/Slider';
  import Modal from '../components/Modal';
  import Quote from '../components/Quote';

  export default {

    data: function () {
      return {

        quotes: [
          {
            id: 1,
            title: '"We accomplish a lot more for \nless."',
            text: 'With Jobs233 you are always a step ahead with our bidding system you are able to hire the right person that meets your need within your budget.',
            author: 'Peter Smith',
            authorPosition: 'CEO & Founder Office 360',
          },
          {
            id: 2,
            title: '"Branding is important "',
            text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque cupiditate dolores enim, ex incidunt rerum ullam! Autem ipsum magnam odit ',
            author: 'Joseph Smith',
            authorPosition: 'CEO & Founder Max int',
          },
          {
            id: 3,
            title: '"Build with Ease "',
            text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque cupiditate dolores enim, ex incidunt rerum ullam! Autem ipsum magnam odit ',
            author: 'Joseph Smith',
            authorPosition: 'CEO & Founder Max int',
          }
        ]
        ,
        showSignUp: false,
        currentQuoteNumber: 0,
        timer: null,
      }
    },
    mounted: function () {
      this.startRotation()

    },
    methods: {
      startRotation: function () {
        this.timer = setInterval(this.showNextQuote, 12000);
        console.log('started');
      },
      stopRotation: function () {
        console.log('paused');
        clearInterval(this.timer);
      },
      showNextQuote: function () {

        var quotesLength = this.quotes.length;

        //find the current visible quote

        if (this.currentQuoteNumber < (quotesLength - 1)) {
          this.currentQuoteNumber += 1;
        } else {
          this.currentQuoteNumber = 0;
        }
      },
      showPreviousQuote: function () {
        var quotesLength = this.quotes.length;
        if (this.currentQuoteNumber <= 0) {
          this.currentQuoteNumber = this.quotes.length - 1;
        } else {
          this.currentQuoteNumber -= 1;
        }
      }
    },
    components: {
      jbSlider: Slider,
      jbModal: Modal,
      jbQuote: Quote,
    }

  }
</script>

<style lang="scss">
</style>
