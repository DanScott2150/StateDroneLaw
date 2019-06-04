<?php
/**
 * Front page
 * @package StateDroneLaw
 *
 * Front Page for StateDroneLaw.com
 * Version: 20190603
 */

get_header(); ?>

<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid text-center p-0 m-0" id="frontpage-jumbotron">
  <div class="frontpage-overlay"> <!-- opacity layer to darken background image, make text more readable -->
    <div class="frontpage-search-content">
      <h1>Search Drone Laws by State</h1>

        <div class="frontpage-search-box">
          <div class="search-wrapper">
            <div id="svg-magnifier">
              <svg version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                <path id="magnifier-2-icon" d="M460.355,421.59L353.844,315.078c20.041-27.553,31.885-61.437,31.885-98.037
                    C385.729,124.934,310.793,50,218.686,50C126.58,50,51.645,124.934,51.645,217.041c0,92.106,74.936,167.041,167.041,167.041
                    c34.912,0,67.352-10.773,94.184-29.158L419.945,462L460.355,421.59z M100.631,217.041c0-65.096,52.959-118.056,118.055-118.056
                    c65.098,0,118.057,52.959,118.057,118.056c0,65.096-52.959,118.056-118.057,118.056C153.59,335.097,100.631,282.137,100.631,217.041
                    z">
                </path>
              </svg>
            </div> <!-- #svg_magnifier -->

            <!-- search funtion currently a jQuery autocomplete function: ./js/autocomplete.js -->
            <input id="tags" placeholder="Enter a State...">

          </div> <!-- search-wrapper -->
        </div> <!-- frontpage-search-box -->

      <p class="my-3">
        Drone laws in the United States are constantly evolving on a state-by-state basis.
          <br/>
        Stay up to date on the laws applicable to you!
      </p>

    </div> <!-- .frontpage-search-content -->
  </div> <!-- .frontpage-overlay -->
</div> <!-- .jumbotron -->
<!-- Jumbotron END -->

<!-- Start Page Content -->
<div class="container">
  <div class="row justify-content-between mt-3 mb-5">
    <div class="col-lg-9 pl-0 pr-0 pr-lg-2">
      <div class="state-info rounded-top">

        <h1 class="py-1"></h1> <!-- gives top blue rounded border based on h1 styling, quick fix for now. Find more semantic way later -->
        <div class="container text-center state-introtext mt-3">

          <h2>Fly a Drone in the United States?</h2>
          <h3>Here’s what you need to know:</h3>

          <div class="frontpage-introbox px-3 py-3 mb-3 rounded">
            <p class="mb-3">The legal landscape surrounding drones in the U.S. is highly fragmented and constantly evolving.
            While the FAA has enacted a handful of regulations regarding drones in U.S. airspace, the majority
            of drone-related legislation is being crafted, enacted, and enforced at the state-level.</p>

            <strong>Sound complicated? It doesn’t have to be!</strong>
            <p class="mt-2 mb-0">Keep reading for <i>3 easy steps</i> to stay on the right side of the law…</p>
          </div> <!-- frontpage-introbox -->

          <div class="frontpage_faa">

            <h4>1) Know the FAA Nationwide Laws &amp; Regulations</h4>

              <div class="container">
                <div class="row">
                  <div class="col-12 col-lg-8 pt-3 pt-xl-4">
                    <p class="text-justify">The United States Federal Aviation Authority (FAA) has put into place a number of regulations and guidelines regarding
                    drone usage. If you’re flying anywhere in U.S. airspace, you need to abide by these rules.</p>

                    <p class="mt-3 mb-0 text-justify">If you use a drone for commercial or business purposes (which the FAA loosely defines as “anything that makes money”),
                    there’s an extra set of regulations which include pilot certification and drone registration. The FAA takes commercial
                    regulations seriously, and isn't afraid to impose fines for drone pilots who don't follow them. Don’t end up like
                    <a href="https://dailysignal.com/2016/06/12/he-flew-a-drone-to-take-photos-for-a-friend-now-hes-facing-55k-in-government-fines/">this guy</a>
                    or <a href="https://petapixel.com/2017/01/18/drone-operator-will-pay-200000-fine-violating-faa-regulations/">this guy</a>.
                    </p>
                  </div> <!--col -->

                  <div class="col-12 col-md-4 py-3 pt-xl-2 pt-lg-4">
                    <img src="https://statedronelaw.com/wp-content/uploads/2017/07/faa_logo.jpg" class="mx-auto" style="width:100%; max-width:250px;" />
                  </div>

                  <div class="col-12 col-md-8 col-lg-12 my-2 mt-md-5 mt-lg-2">
                    <div class="frontpage-faa-links py-3 px-3">

                      <p class="mb-2"><a href="https://www.faa.gov/uas/getting_started/fly_for_fun/">Click here to read the FAA Drone Regulations for hobby &amp;
                        recreational use</a>
                      </p>
                      <p class="mb-0"><a href="https://www.faa.gov/uas/getting_started/fly_for_work_business/">Click here to read the FAA Drone
                          Regulations for commercial &amp; business use</a>
                      </p>
                    </div> <!-- frontpage-faa-links -->
                  </div> <!-- col -->

                </div> <!-- row  [line 42] -->

                <div class="row">
                  <div class="col-12 pt-3">
                      <h5 style="font-size: 18px;" class="clear"><i><strong>Question: Do I need to register my drone with the FAA?</strong></i></h5>

                      <p class="text-justify mb-3"><b>Yes.</b> If your drone weighs more than 0.55 pounds, you need to register it with the FAA.
                        While this requirement was <a href="https://www.recode.net/2017/5/19/15663436/us-drone-registration-rules-faa">previously struck
                        down by the courts</a>, the National Defense Authorization Act passed in December 2017 officially gave the FAA the authority
                        to require all drones in U.S. airspace to be registered </p>

                      <p class="mb-3 text-justify">Further Reading:
                        <a href="https://techcrunch.com/2017/12/12/trump-signs-bill-reinstating-the-faas-drone-registration-requirement">President Trump Signs Bill Reinstating the FAA's Drone Registration Requirement</a> |
                        <a href="https://www.congress.gov/bill/115th-congress/house-bill/2810">National Defense Authorization Act of 2018</a>
                      </p>

                      <p class="text-justify mb-3">If your drone weighs more than 0.55 pounds but less than 55 pounds, you can complete your registration online. Registration costs $5 and is valid for 3 years. <a href="https://faadronezone.faa.gov">Click here to visit FAA.gov and register your drone with the FAA</a></p>
                      <p class="mb-3"><b><i>Please note that registration can be completed directly on the official FAA website for a cost of $5. <u>Beware of scam websites</u> offering to register your drone for a higher price! </b></i></p>

                  </div> <!-- col -->
                </div> <!-- row -->

              </div> <!--container [[[Do We Need this container?]]] -->

              <div class="container">
                <div class="row">
                  <div class="col">
                    <h4 class="m-3"><u>2) Know the State and Local Laws Where You're Flying</u></h4>
                    <p class="text-justify">
                      The vast majority of drone regulations are happening at the state and local level. As of July 2017, every state in the U.S. has
                      at least one drone-related law that is either currently effective, or in the process of being passed by local officials. These
                      laws cover a wide range of prohibitions relating to privacy, aerial trespassing, photography, weaponization, and more.
                    </p>
                  </div> <!-- col -->
                </div> <!-- row -->


<!-- CountUp boxes -->
                <div class="row">
                  <div class="col">
                    <div class="frontpage-countbox mt-3">
                      <h5>U.S. Drone Law Statistics at a glance...</h5>

                      <!-- script src: ./js/countup.js -->
                      
                      <ul>
                        <li>
                          <span class="fa fa-globe fa-3x"></span>
                          <br/>U.S.
                          <br/>States
                          <div 
                            id="countup-states"
                            class="frontpage-counter"
                            data-target="50">
                            <?php echo do_shortcode('[currentlaws_count]') ?>
                          </div>
                        </li>
                        <li>
                          <span class="fa fa-gavel fa-3x"></span>
                          <br/>Current
                          <br/>Laws
                          <div 
                            id="countup-current" 
                            class="frontpage-counter" 
                            data-target="<?php echo do_shortcode('[currentlaws_count]')?>">
                          <?php echo do_shortcode('[currentlaws_count]') ?>
                         </li>
                        <li>
                          <span class="fa fa-hourglass-half fa-3x"></span>
                          <br/>Pending
                          <br/>Laws
                          <div 
                            id="countup-pending" 
                            class="frontpage-counter" 
                            data-target="<?php echo do_shortcode('[pendinglaws_count]')?>">
                          <?php echo do_shortcode('[pendinglaws_count]') ?>
                        </li>
                        <li>
                          <span class="fa fa-map-pin fa-3x"></span>
                          <br/>Municipal
                          <br/>Laws
                           <div 
                            id="countup-municipal" 
                            class="frontpage-counter" 
                            data-target="<?php echo do_shortcode('[municipallaws_count]')?>">
                          <?php echo do_shortcode('[municipallaws_count]') ?>
                        </li>
                      </ul>
                    </div> <!-- frontpage-countbox -->
                  </div> <!-- col -->
                </div> <!-- row -->
<!-- END of CountUp boxes -->

                <div class="row">
                  <div class="col mt-3">
                    <p class="text-justify">
                      In addition to laws at the state level, drone pilots should also be aware of additional local laws. Many cities, towns, and other
                      municipalities have enacted their own drone-related ordinances. Some states have passed “preemption” laws, explicitly forbidding
                      these municipal drone laws in order to prevent a “patchwork” of airspace regulations. These pre-emption laws are becoming increasingly
                      common among state legislatures, which will hopefully make life a little easier for drone pilots in the future. Until then – be sure to
                      double-check for municipal ordinances in order to avoid
                      <a href="https://www.chicagotribune.com/suburbs/elgin-courier-news/news/ct-ecn-south-elgin-drone-ticket-st-0908-20160907-story.html">citations
                        and fines.</a>
                    </p>
                  </div>  <!-- col -->
                </div> <!-- row -->

                <div class="row mt-3">
                  <div class="col">
                    <h5><strong><i>Question: Do states and municipalities have the authority to regulate airspace?</i></strong></h5>
                    <p class="text-center mt-3">Technically? No. In practice? Sort of. Will this change in the future? Almost certainly.</p>
                    <p class="text-justify mt-3">
                      Per current laws, the FAA has sole jurisdiction over all U.S. airspace. This means that individual states and municipalities
                      are not allowed to created their own “drone bans” or other airspace restrictions. However, the FAA has given limited pushback
                      to states enacting their own drone-related laws, and there are numerous indications that the states will be officially given more
                      power in this regard in the near future. The <a href="https://en.wikipedia.org/wiki/Drone_Federalism_Act_of_2017">Drone Federalism
                      Act of 2017</a> is currently making its way through U.S. Congress and would give individual states the authority to regulate
                      airspace up to 200 feet, while still allowing the FAA jurisdiction over higher altitudes.
                    </p>
                </div> <!-- col -->
              </div> <!-- row -->

            </div> <!-- container -->

<!-- Email Subscribe box -->
              <div class="container">
                  <div class="row">
                    <div class="col">
                      <h4 class="mt-3"><u>3) Subscribe to free email alerts to stay up to date!</u></h4>
                    </div> <!-- col -->
                  </div> <!-- row -->

                  <div class="row mb-3">
                    <div class="col-12 col-lg-8 text-justify pt-3">
                      <p class="mb-3">
                        The legal landscape for drones is constantly changing. In addition to evolving
                        regulations and questions over jurisdiction with the FAA, drone pilots also need
                        to be aware of state and local laws which are being debated, passed, and enacted at a rapid rate.
                      </p>
                      <p class="mb-3">
                        As a drone operator, YOU are responsible for making sure you comply with all relevant laws and
                        regulations. Stay up to date – and on the right side of the law!
                      </p>
                      <div>
                        <!-- MailChimp plugin -->
                        <?php echo do_shortcode('[mc4wp_form id="622"]'); ?>
                      </div>
                      <p class="text-center font-weight-bold mb-0">
                        Sign up for <u>FREE</u> email alerts to receive a notification any time the laws for your state get updated!
                      </p>

                    </div> <!-- col -->
                    <div class="col-12 col-sm-4 mt-3 pr-sm-0">
                      <img src="https://statedronelaw.com/wp-content/uploads/2017/07/cta-bg-01-1.jpg" class="frontpage-cta-img mx-auto" style="width:100%; max-width:250px;" />
                    </div>

                  </div> <!-- row -->
                </div> <!-- container -->
<!-- END of email subscribe box -->

      </div> <!-- frontpage-faa [[This div should probably be re-named]] -->

        </div> <!-- container -->
      </div> <!-- state-info -->

    </div> <!--  -->



<?php
get_sidebar();
get_footer();
