@extends('layout.common')

@include('layout.head')

@section('body_till_navbar')
    <!-- Page-->
    <div class="page text-center">
      <!-- Page Header-->
      <header class="page-head">
@endsection
@include('layout.navbar_light')

@section('main')
      <!-- Classic Breadcrumbs-->
      <section class="breadcrumb-classic">
        <div class="shell section-34 section-sm-50">
          <div class="range range-lg-middle">
            <div class="cell-lg-2 veil reveal-sm-block cell-lg-push-2"><span class="mdi mdi-account-check icon icon-white"></span></div>
            <div class="cell-lg-5 veil reveal-lg-block cell-lg-push-1 text-lg-left">
              <h2><span class="big">Careers</span></h2>
            </div>
            <div class="offset-top-0 offset-sm-top-10 cell-lg-5 offset-lg-top-0 small cell-lg-push-3 text-lg-right">
              <ul class="list-inline list-inline-dashed p">
                <li><a href="index.html">Home</a></li>
                <li>Careers
                </li>
              </ul>
            </div>
          </div>
        </div>
        <svg class="svg-triangle-bottom" xmlns="http://www.w3.org/2000/svg" version="1.1">
          <defs>
            <lineargradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
              <stop offset="0%" style="stop-color:rgb(110,192,161);stop-opacity:1;"></stop>
              <stop offset="100%" style="stop-color:rgb(111,193,156);stop-opacity:1;"></stop>
            </lineargradient>
          </defs>
          <polyline points="0,0 60,0 29,29" fill="url(#grad1)"></polyline>
        </svg>
      </section>
      <!-- Page Content-->
      <main class="page-content">
        <!-- section join our team-->
        <section class="section-124">
          <div class="shell">
            <div class="range range-xs-center">
              <div class="cell-xs-8">
                <h1>Join Our Team</h1>
                <div>
                  <hr class="divider bg-mantis">
                </div>
                <div class="offset-top-20">
                  <p>Take a job opportunity of a lifetime ??? join the team of Intense. We cherish active tech savvies willing to work on projects of any type and complexity. If you are enthusiastic about tech innovations and ready to make impactful decisions, feel free to send us your CV. We are interested in hiring professionals for a long term and also provide an opportunity of remote work.</p>
                </div>
                <div class="offset-top-34"><a class="btn btn-primary btn-icon btn-icon-left" href="#" data-custom-scroll-to="careers-start"><span class="icon mdi mdi-check-all"></span>Get Started now</a></div>
              </div>
            </div>
          </div>
        </section>
        <!-- section reasons to get-->
        <section class="section-66 section-top-50 bg-mantis section-triangle section-triangle-bottom context-dark">
          <div class="shell">
            <div class="range range-sm-center">
              <h2><span class="big"> Explore Our Corporate Culture</span></h2>
              <div class="cell-md-8">
                <p>At Intense, we provide career solutions to people interested in conducting broad-scale research and making technological breakthroughs based on them. If you are one of them, learn more about the main points of our corporate culture below.</p>
              </div>
            </div>
          </div>
          <svg class="svg-triangle-bottom" xmlns="http://www.w3.org/2000/svg" version="1.1">
            <defs>
              <lineargradient id="grad2" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" style="stop-color:rgb(99,189,98);stop-opacity:1;"></stop>
                <stop offset="100%" style="stop-color:rgb(99,189,98);stop-opacity:1;"></stop>
              </lineargradient>
            </defs>
            <polyline points="0,0 60,0 29,29" fill="url(#grad2)"></polyline>
          </svg>
        </section>
        <section class="section-66 section-sm-0">
          <div class="shell">
            <div class="range range-xs-center range-sm-left">
              <div class="cell-xs-10 cell-sm-6 section-image-aside section-image-aside-right text-left">
                <div class="section-image-aside-img veil reveal-sm-block" style="background-image: url(images/pages/careers-01-960x540.jpg);"></div>
                <div class="section-image-aside-body section-sm-66 inset-sm-right-30">
                  <div>
                    <h3 class="text-picton-blue">01</h3>
                  </div>
                  <div class="offset-top-10">
                    <h2> The Main Corporate Values of Intense</h2>
                  </div>
                  <div class="offset-top-20">
                    <p>The corporate culture of Intense is based on openness, respect and equality regardless of the religion, sex, race, age, etc. These core values help us build a friendly working environment, where all the employees can feel comfortable and significant. We believe that the more comfort you get, the better results you???ll produce.</p>
                    <p>Members of our staff are free to choose working hours themselves, without any limitations. Such a strategy allows us to make the most of each employee???s potential, as they work when they are maximally productive.</p>
                    <p>What you may also find attractive about our corporation is a competitive benefits package. It includes a paid vacation, sick leave and national holidays, medical insurance, gym and swimming pool, parking and mobile phone reimbursement. Our corporate fridge is also full of free snacks and drinks.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="range range-xs-center range-sm-right offset-top-0">
              <div class="cell-xs-10 cell-sm-6 section-image-aside section-image-aside-left text-left">
                <div class="section-image-aside-img veil reveal-sm-block" style="background-image: url(images/pages/careers-02-960x540.jpg);"></div>
                <div class="section-image-aside-body offset-top-41 offset-sm-top-0 section-sm-66 inset-sm-left-50">
                  <div>
                    <h3 class="text-picton-blue">02</h3>
                  </div>
                  <div class="offset-top-10">
                    <h2> Diversity of Learning Opportunities at Intense</h2>
                  </div>
                  <div class="offset-top-20">
                    <p>When you join our team, you???ll dive into a knowledge-sharing environment. We encourage our employees to attend multiple conferences and workshops held both inside the company and on the outside. Keep in mind that you can take part in conferences as both a listener and speaker.</p>
                    <p>As a part of our benefits package, we also offer multiple courses for you to master new subjects. Our working environment is full of learning opportunities, which can???t help motivating for a steady professional growth.</p>
                    <p>Offices of Intense are located in different corners of the globe, so be ready to travel around the world. To save your budget, we cover all the travel costs including transportation, accommodation, food, and even some leisure activities. Our company gives you a perfect chance to explore the world and immerse in different cultures.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="range range-xs-center range-sm-left offset-top-0">
              <div class="cell-xs-10 cell-sm-6 section-image-aside section-image-aside-right text-left">
                <div class="section-image-aside-img veil reveal-sm-block" style="background-image: url(images/pages/careers-03-960x540.jpg);"></div>
                <div class="section-image-aside-body offset-top-41 offset-sm-top-0 section-sm-66 inset-sm-right-30">
                  <div>
                    <h3 class="text-picton-blue">03</h3>
                  </div>
                  <div class="offset-top-10">
                    <h2> Top Qualities We Are Looking For</h2>
                  </div>
                  <div class="offset-top-20">
                    <p>Searching for candidates, our HR managers prioritize a number of qualities. To get a job at Intense, you must be a self-motivated person who isn???t afraid of challenges and is ready to work overtime. As we work with multiple innovative technologies, you must be a quick learner. Attention to detail is also important for us, as it is a solid prerequisite for fewer bugs.</p>
                    <p>Our company consists of many teams, that???s why you must be a team player and excellent communicator both in writing and oral speech. Our work is also based on mutual assistance, so be ready to lend a helping hand whenever you???re asked.</p>
                    <p>You are unlikely to find a project manager who wouldn???t appreciate punctuality and discipline. The same goes for PMs of Intense. If you want to build a long-term career at our company, you will have to avoid late arrivals, unnecessary breaks and hanging out in social networks. Also be polite not only with your boss, but also with colleagues and newcomers.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="range range-xs-center range-sm-right offset-top-0">
              <div class="cell-xs-10 cell-sm-6 section-image-aside section-image-aside-left text-left">
                <div class="section-image-aside-img veil reveal-sm-block" style="background-image: url(images/pages/careers-04-960x540.jpg);"></div>
                <div class="section-image-aside-body offset-top-41 offset-sm-top-0 section-sm-66 inset-sm-left-50">
                  <div>
                    <h3 class="text-picton-blue">04</h3>
                  </div>
                  <div class="offset-top-10">
                    <h2> Check Interview Stages at Intense</h2>
                  </div>
                  <div class="offset-top-20">
                    <p>Whenever you decide to send us your CV, be ready for a job interview that goes in several stages. At the first stage, we???d like to learn about your experience, interests, and expectations. At the end of the interview, you will need to undergo a test allowing us to evaluate your skills.</p>
                    <p>After successful completion of the test, you???ll be invited to the second interview stage. We will arrange a meeting with your future PM to give you a detailed overview of your project and key responsibilities.</p>
                    <p>Next, our team will make a final decision on your joining us. At the last stage of the interview, we will discuss your salary, benefits package, and some legal issues. If we reach an agreement, our HR will take you on an excursion through our office premises.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- section career start here-->
        <section class="section-66 section-top-50 bg-blue-gray section-triangle section-triangle-bottom context-dark" id="careers-start">
          <div class="shell">
            <h2><span class="big"> Your Career Starts Here</span></h2>
            <p>Can't find the job you want? Send your resume to <a href="#">info@demolink.com</a> , and we'll contact you when a new position opens.</p>
          </div>
          <svg class="svg-triangle-bottom" xmlns="http://www.w3.org/2000/svg" version="1.1">
            <defs>
              <lineargradient id="grad3" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" style="stop-color:rgb(109,146,204);stop-opacity:1;"></stop>
                <stop offset="100%" style="stop-color:rgb(109,146,204);stop-opacity:1;"></stop>
              </lineargradient>
            </defs>
            <polyline points="0,0 60,0 29,29" fill="url(#grad3)"></polyline>
          </svg>
        </section>
        <section class="section-98 section-md-110">
          <div class="shell">
            <div class="range">
              <div class="cell-sm-6">
                        <!-- Vacation--><a class="post-vacation text-left" href="#">
                          <div>
                            <h3>Senior Job Position </h3>
                          </div>
                          <div class="post-meta offset-top-10">
                            <ul class="list-inline list-inline-sm p">
                              <li><span class="text-middle icon-xxs mdi mdi-map-marker text-picton-blue"></span> <span class="text-middle small text-dark">New York</span>
                              </li>
                              <li><span class="text-middle icon-xxs mdi mdi-clock text-picton-blue"></span> <span class="text-middle small text-dark">Full Time</span>
                              </li>
                              <li><span class="text-middle icon-xxs mdi mdi-calendar text-picton-blue"></span> 
                                <time class="text-middle small text-dark" datetime="2016-01-01">March 12, 2016</time>
                              </li>
                            </ul>
                          </div></a>
              </div>
              <div class="cell-sm-6 offset-top-30 offset-sm-top-0">
                        <!-- Vacation--><a class="post-vacation text-left" href="#">
                          <div>
                            <h3>Middle Job Position</h3>
                          </div>
                          <div class="post-meta offset-top-10">
                            <ul class="list-inline list-inline-sm p">
                              <li><span class="text-middle icon-xxs mdi mdi-map-marker text-picton-blue"></span> <span class="text-middle small text-dark">New York</span>
                              </li>
                              <li><span class="text-middle icon-xxs mdi mdi-clock text-picton-blue"></span> <span class="text-middle small text-dark">Full Time</span>
                              </li>
                              <li><span class="text-middle icon-xxs mdi mdi-calendar text-picton-blue"></span> 
                                <time class="text-middle small text-dark" datetime="2016-01-01">March 10, 2016</time>
                              </li>
                            </ul>
                          </div></a>
              </div>
              <div class="cell-sm-6 offset-top-30">
                        <!-- Vacation--><a class="post-vacation text-left" href="#">
                          <div>
                            <h3>Junior Job Position</h3>
                          </div>
                          <div class="post-meta offset-top-10">
                            <ul class="list-inline list-inline-sm p">
                              <li><span class="text-middle icon-xxs mdi mdi-map-marker text-picton-blue"></span> <span class="text-middle small text-dark">New York</span>
                              </li>
                              <li><span class="text-middle icon-xxs mdi mdi-clock text-picton-blue"></span> <span class="text-middle small text-dark">Full Time</span>
                              </li>
                              <li><span class="text-middle icon-xxs mdi mdi-calendar text-picton-blue"></span> 
                                <time class="text-middle small text-dark" datetime="2016-01-01">March 12, 2016</time>
                              </li>
                            </ul>
                          </div></a>
              </div>
              <div class="cell-sm-6 offset-top-30">
                        <!-- Vacation--><a class="post-vacation text-left" href="#">
                          <div>
                            <h3>Junior Job Position 2</h3>
                          </div>
                          <div class="post-meta offset-top-10">
                            <ul class="list-inline list-inline-sm p">
                              <li><span class="text-middle icon-xxs mdi mdi-map-marker text-picton-blue"></span> <span class="text-middle small text-dark">New York</span>
                              </li>
                              <li><span class="text-middle icon-xxs mdi mdi-clock text-picton-blue"></span> <span class="text-middle small text-dark">Full Time</span>
                              </li>
                              <li><span class="text-middle icon-xxs mdi mdi-calendar text-picton-blue"></span> 
                                <time class="text-middle small text-dark" datetime="2016-01-01">March 17, 2016</time>
                              </li>
                            </ul>
                          </div></a>
              </div>
              <div class="cell-sm-6 offset-top-30">
                        <!-- Vacation--><a class="post-vacation text-left" href="#">
                          <div>
                            <h3>Senior Job Position 2</h3>
                          </div>
                          <div class="post-meta offset-top-10">
                            <ul class="list-inline list-inline-sm p">
                              <li><span class="text-middle icon-xxs mdi mdi-map-marker text-picton-blue"></span> <span class="text-middle small text-dark">New York</span>
                              </li>
                              <li><span class="text-middle icon-xxs mdi mdi-clock text-picton-blue"></span> <span class="text-middle small text-dark">Full Time</span>
                              </li>
                              <li><span class="text-middle icon-xxs mdi mdi-calendar text-picton-blue"></span> 
                                <time class="text-middle small text-dark" datetime="2016-01-01">March 15, 2016</time>
                              </li>
                            </ul>
                          </div></a>
              </div>
              <div class="cell-sm-6 offset-top-30">
                        <!-- Vacation--><a class="post-vacation text-left" href="#">
                          <div>
                            <h3>Middle Job Position 2</h3>
                          </div>
                          <div class="post-meta offset-top-10">
                            <ul class="list-inline list-inline-sm p">
                              <li><span class="text-middle icon-xxs mdi mdi-map-marker text-picton-blue"></span> <span class="text-middle small text-dark">New York</span>
                              </li>
                              <li><span class="text-middle icon-xxs mdi mdi-clock text-picton-blue"></span> <span class="text-middle small text-dark">Full Time</span>
                              </li>
                              <li><span class="text-middle icon-xxs mdi mdi-calendar text-picton-blue"></span> 
                                <time class="text-middle small text-dark" datetime="2016-01-01">March 21, 2016</time>
                              </li>
                            </ul>
                          </div></a>
              </div>
            </div>
          </div>
        </section>
      </main>
@endsection
@include('layout.footer')