<?php
/**
 * Main state-level page
 * Displays all the laws & related info for given state
 *
 * Uses WordPress custom post types to find all 'law' entries
 * Then filters based on custom taxonomy for the applicable state
 * Then sorts based on second custom taxonomy for current/pending/other
 *
 * Version: 20180425
 *
 * @package StateDroneLaw
 */

get_header(); ?>

<!-- Establish which state this page is for -->
<?php
  $current_page = get_queried_object();
  $current_state_name = $current_page->name;
  if ( have_posts() ) :
?>


<!-- move to header file (?) [START] -->
  <div class="container">

    <!-- Breadcrumbs -->
    <!-- There should be a way to separate this out into a function, then just call the function? -->
  <div class="row breadcrumbs mt-2">
    <div class="col p-0">
      <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/browse">States</a></li>
        <li><a href="#"><?php echo $current_state_name ?></a></li>
      </ul>
    </div> <!-- breadcrumbs -->
  </div> <!-- row -->

  <!-- Promobox -->
  <!-- Same as breadcrumbs, probably a way to separate out into external function -->
  <div class="row">
    <div class="promobox col mt-2 p-2">

      <?php the_ad(2320); ?>

      <p>
        New to drones? Looking to bolster your aerial photography skills, or start a drone mapping business? Be sure to check out <a href="https://click.linksynergy.com/fs-bin/click?id=07P/PKddxEs&offerid=323058.1629&subid=0&type=4">Udemy.com</a> today!<br/>
        Udemy features a premium collection of online video courses and tutorials covering a wide range of topics – including drones!
      </p>
    </div> <!-- promobox -->
  </div> <!-- row -->

<!-- move to header file [END] -->

<!-- Start Page Content -->
  <div class="row justify-content-between mt-2 mb-5">
    <div class="col-lg-9 pl-0 pr-0 pr-lg-2">
      <div class="state-info rounded-top">

        <h1 class="py-1">
          <?php echo $current_state_name . ' '; ?> Drone Laws
        </h1>

        <div class="container text-center state-introtext my-3">
          <p>
            The following are the drone-related laws and regulations for the state of <?php echo $current_state_name; ?>,
            as well as any ordinances or bylaws that have been enacted by cities or towns within the state.
          </p>
        </div>


        <!-- Begin of law content -->
        <div class="container px-0 state-laws">


        <!-- CURRENT LAWS -->
        <!-- Currently using 'Tabby' plugin for tabbed content -->
        <!-- Is there a better way than echo-ing the shortcode? -->
          <?php echo do_shortcode('[tabby title="Current Laws" icon="gavel"]');?>
            <div class="currentlaws">
              <p class="explainertext">
                <strong>Current Laws</strong> consist of pieces of legislation that have been passed and signed into law.
              </p>

              <!-- Create WordPress Loop to display all current laws -->
            <?php
              $args = array(
                        'post-type' => 'laws',  //Find all custom post types 'law'
                        'tax_query' => array(
                                          'relation' => 'AND',
                                                        array(
                                                           'taxonomy' => 'state', //Filter so that state matches current page
                                                           'field' => 'slug',
                                                           'terms' => $current_state_name
                                                        ),
                                                        array(
                                                          'taxonomy' => 'status', //Further filter by 'Current' status
                                                          'field' => 'slug',
                                                          'terms' => 'Current'
                                                        )
                                       )
                      );

              $state_laws = new WP_Query( $args );

              if( $state_laws->have_posts() ){
                while ( $state_laws->have_posts() ) : $state_laws->the_post();
                    //Populate variables with metadata about the law
                    //These pull from ACF custom fields
                    $bill_number = get_field('bill_number');
                    $bill_name = get_field('bill_name');
                    $bill_year = get_field('bill_year');
                    $ref_title = get_field('ref_title');
                    $ref_link = get_field('ref_link');
                    $post_date = get_the_date();
            ?>

          <!-- Start of Law Post Content -->
            <div class="law-content">
                <!-- Law Header -->
                <div class="law-heading px-3 py-2">
                  <div class="row">
                    <div class="col-12 col-lg-8 text-center text-lg-left pl-3">
                      <h3>
                        <?php if(!empty($bill_name)){
                                  echo $bill_number . ' - ' . $bill_name;
                              } else {
                                  echo $bill_number;
                              }
                        ?>
                      </h3>
                    </div>
                    <div class="col-12 col-lg-4 text-center text-lg-right pr-md-3 text-nowrap">
                      <div class="law-date"><?php echo $bill_year; ?></div>
                    </div>

                  </div> <!-- row -->
                </div> <!-- law-heading -->

                <!-- Law description -->
                <div class="law-info px-3 py-2">
                  <?php echo the_content(); ?>
                </div>

                <!-- Law footer -->
                <div class="law-footer px-3 py-2">
                  <div class="row">
                    <div class="col-12 col-md-7 text-center text-md-left pl-3">
                      Reference:
                      <a href="<?php echo $ref_link ?>"><?php echo $ref_title ?></a>
                    </div>
                    <div class="col-12 col-md-5 text-center text-md-right text-nowrap">
                      <small><i>Posted: <?php echo $post_date ?></i></small>
                    </div>
                  </div> <!-- row -->
                </div> <!-- .law-footer -->

              </div> <!-- law-content -->
            <!-- End of Law Post Content -->

    <?php
        endwhile;
      } else { ?> <!-- If there are no laws found -->
          <p>No Laws</p>

    <?php }
      wp_reset_query();
    ?>

  </div> <!-- .currentlaws -->


<!-- PENDING LAWS -->
<!-- Is there a way to change above code so that it just repeats for Pending & Other? -->
<!-- Seems unnecessary to repeat the same code and just change "current" to "pending" -->
            <?php echo do_shortcode('[tabby title="Pending Laws" icon="hourglass-half"]'); ?>
            <div class="pendinglaws">
              <p class="explainertext"><strong>Pending Laws</strong> consist of pieces of legislation that have
                been publicly introduced or debated, but not signed into law.</p>

              <?php
                $args = array(
                          'post-type' => 'laws',
                          'tax_query' => array(
                                            'relation' => 'AND',
                                                          array(
                                                             'taxonomy' => 'state',
                                                             'field' => 'slug',
                                                             'terms' => $current_state_name
                                                          ),
                                                          array(
                                                            'taxonomy' => 'status',
                                                            'field' => 'slug',
                                                            'terms' => 'Pending'
                                                          )
                                         )
                        );

                $state_laws = new WP_Query( $args );

                if( $state_laws->have_posts() ){
                  while ( $state_laws->have_posts() ) : $state_laws->the_post();
                      $bill_number = get_field('bill_number');
                      $bill_name = get_field('bill_name');
                      $bill_year = get_field('bill_year');
                      $ref_title = get_field('ref_title');
                      $ref_link = get_field('ref_link');
                      $post_date = get_the_date();
              ?>


              <div class="law-content">
                  <div class="law-heading px-3 py-2">
                    <div class="row">
                      <div class="col-12 col-lg-8 text-center text-lg-left pl-3">
                        <?php if(!empty($bill_name)){
                                  echo $bill_number . ' - ' . $bill_name;
                              } else {
                                  echo $bill_number;
                              }
                        ?>
                      </div>
                      <div class="col-12 col-lg-4 text-center text-lg-right pr-md-3 text-nowrap">
                        <span style="font-size: 85%; font-style: italic"><?php echo $bill_year; ?></span>
                      </div>

                    </div> <!-- row -->
                  </div> <!-- law-heading -->

                  <div class="law-info px-3 py-2">
                    <?php echo the_content(); ?>
                  </div> <!-- law-info -->

                  <div class="law-footer px-3 py-2">
                    <div class="row">
                      <div class="col-12 col-md-7 text-center text-md-left pl-3">
                        Reference:
                        <a href="<?php echo $ref_link ?>"><?php echo $ref_title ?></a>
                      </div>
                      <div class="col-12 col-md-5 text-center text-md-right text-nowrap">
                        <small><i>Posted: <?php echo $post_date ?></i></small>
                      </div>
                    </div> <!-- row -->
                  </div> <!-- .law-footer -->
                </div> <!-- law-content -->

      <?php
          endwhile;
        } else { ?> <!-- If there are no laws found -->
            <p>No Laws</p>

      <?php }
        wp_reset_query();
      ?>

    </div> <!-- .pendinglaws -->


<!-- OTHER NOTES -->
            <?php echo do_shortcode('[tabby title="Other Notes" icon="file-text-o"]'); ?>
            <div class="othernotes">
              <p class="explainertext"><strong>Other Notes</strong> regarding the usage of drones in the state of <?php echo $current_state_name; ?>.</p>

              <?php
                /* Create Wordpress loop to display all current laws */
                $args = array(
                          'post-type' => 'laws',
                          'tax_query' => array(
                                            'relation' => 'AND',
                                                          array(
                                                             'taxonomy' => 'state',
                                                             'field' => 'slug',
                                                             'terms' => $current_state_name
                                                          ),
                                                          array(
                                                            'taxonomy' => 'status',
                                                            'field' => 'slug',
                                                            'terms' => 'Other'
                                                          )
                                         )
                        );

                $state_laws = new WP_Query( $args );

                if( $state_laws->have_posts() ){
                  while ( $state_laws->have_posts() ) : $state_laws->the_post();
                      $bill_number = get_field('bill_number');
                      $bill_name = get_field('bill_name');
                      $bill_year = get_field('bill_year');
                      $ref_title = get_field('ref_title');
                      $ref_link = get_field('ref_link');
                      $post_date = get_the_date();
              ?>


              <div class="law-content">
                  <div class="law-heading px-3 py-2">
                    <div class="row">
                      <div class="col-12 col-lg-8 text-center text-lg-left pl-3">
                        <?php if(!empty($bill_name)){
                                  echo $bill_number . ' - ' . $bill_name;
                              } else {
                                  echo $bill_number;
                              }
                        ?>
                      </div>
                      <div class="col-12 col-lg-4 text-center text-lg-right pr-md-3 text-nowrap">
                        <span style="font-size: 85%; font-style: italic"><?php echo $bill_year; ?></span>
                      </div>

                    </div> <!-- row -->
                  </div> <!-- law-heading -->

                  <div class="law-info px-3 py-2">
                    <?php echo the_content(); ?>
                  </div> <!-- law-info -->

                  <div class="law-footer px-3 py-2">
                    <div class="row">
                      <div class="col-12 col-md-7 text-center text-md-left pl-3">
                        Reference:
                        <a href="<?php echo $ref_link ?>"><?php echo $ref_title ?></a>
                      </div>
                      <div class="col-12 col-md-5 text-center text-md-right text-nowrap">
                        <small><i>Posted: <?php echo $post_date ?></i></small>
                      </div>
                    </div> <!-- row -->
                  </div> <!-- .law-footer -->
                </div> <!-- law-content -->

      <?php
          endwhile;
        } else { ?> <!-- If there are no laws found -->
            <p>No Laws</p>

      <?php }
        wp_reset_query();
      ?>

    </div> <!-- .othernotes -->

    <!-- Close the shortocde for tabbed content -->
    <?php echo do_shortcode('[tabbyending]'); ?>

  </div> <!-- state-laws -->
<!-- End of Law Content -->


            <!-- Email Alerts -->
            <div class="container mt-4 px-4">
              <div class="row">
                <div class="col-12 col-md-7 text-center cta-text">
                  <h3><u>Sign up for Email Alerts!</u></h3>
                  <p class="mt-3 mb-2">
                    The legal landscape for drones is constantly changing. As a drone operator,
                    YOU are responsible for making sure you comply with all relevant laws and regulations.
                    Stay up to date – and on the right side of the law!
                  </p>
                  <p>
                    Sign up for <strong>FREE</strong> email alerts to receive a notification
                    anytime the laws for your state get updated!
                  </p>
                </div>

                <div class="col-12 col-md-5 text-center pt-3">

                <?php echo do_shortcode('[mc4wp_form id="622"]'); ?>
              </div>

            </div><!-- row -->
          </div> <!-- container -->
          <!-- End Email Alerts -->

          <!-- AirMap -->
          <div class="container px-0">
            <?php echo do_shortcode('[tabby title="Restricted Airspace Map" icon="map-marker"]'); ?>
              <p class="explainertext">
                The map below shows airspace is that is prohibited, restricted, or cautionary for drone flight.
                Click on a specific area for further details, including contact information for local air control towers.
                This map contains data from the FAA and may not fully reflect the local laws listed above.
              </p>

<div id="map">

<!-- AirMap Integration -->
<!-- Uses AirMap's API to generate restricted airspace map -->
<!-- Sets default view based on state page, currently via array of default coordinates -->
<!-- There's probably a better way to do this, or at least break the array out into an external function -->
<!-- As opposed to passing the array each time the page loads? -->

              <?php
              /* Establish an array that holds default map coordinates for each state */
                  $StateDroneLaw_airmap_data = array(
                    'Alabama' => array(
                      'Lat' => '32.7358054',
                      'Long' => '-86.9644115',
                      'Zoom' => '6'
                    ),
                    'Alaska' => array(
                      'Lat' => '64.2883712',
                      'Long' => '-152.6676209',
                      'Zoom' => '4'
                    ),
                    'Arizona' => array(
                      'Lat' => '34.3332552',
                      'Long' => '-111.4855274',
                      'Zoom' => '6.25'
                    ),
                    'Arkansas' => array(
                      'Lat' => '34.8611999',
                      'Long' => '-92.0604567',
                      'Zoom' => '7'
                    ),
                    'California' => array(
                      'Lat' => '37.292087',
                      'Long' => '-119.9180956',
                      'Zoom' => '4.75'
                    ),
                    'Colorado' => array(
                      'Lat' => '39.1505728',
                      'Long' => '-105.2492236',
                      'Zoom' => '5.75'
                    ),
                    'Connecticut' => array(
                      'Lat' => '41.6678012',
                      'Long' => '-72.6457795',
                      'Zoom' => '8'
                    ),
                    'Delaware' => array(
                      'Lat' => '39.0635326',
                      'Long' => '-75.2284211',
                      'Zoom' => '8'
                    ),
                    'Florida' => array(
                      'Lat' => '27.9104234',
                      'Long' => '-82.7700782',
                      'Zoom' => '5.5'
                    ),
                    'Georiga' => array(
                      'Lat' => '32.8741196',
                      'Long' => '-82.9093622',
                      'Zoom' => '6'
                    ),
                    'Hawaii' => array(
                      'Lat' => '20.6382488',
                      'Long' => '-157.5336004',
                      'Zoom' => '6'
                    ),
                    'Idaho' => array(
                      'Lat' => '45.5828066',
                      'Long' => '-114.1447212',
                      'Zoom' => '5.5'
                    ),
                    'Illinois' => array(
                      'Lat' => '39.9540541',
                      'Long' => '-89.0131558',
                      'Zoom' => '5.5'
                    ),
                    'Indiana' => array(
                      'Lat' => '39.826013',
                      'Long' => '-86.5489256',
                      'Zoom' => '6.5'
                    ),
                    'Iowa' => array(
                      'Lat' => '42.0964344',
                      'Long' => '-93.2322941',
                      'Zoom' => '6.5'
                    ),
                    'Kansas' => array(
                      'Lat' => '38.636368',
                      'Long' => '-98.1069013',
                      'Zoom' => '5.5'
                    ),
                    'Kentucky' => array(
                      'Lat' => '37.7294745',
                      'Long' => '-85.2311509',
                      'Zoom' => '5.5'
                    ),
                    'Louisiana' => array(
                      'Lat' => '31.3929197',
                      'Long' => '-92.0624094',
                      'Zoom' => '6'
                    ),
                    'Maine' => array(
                      'Lat' => '44.1111832',
                      'Long' => '-68.9604483',
                      'Zoom' => '6.5'
                    ),
                    'Maryland' => array(
                      'Lat' => '38.9661505',
                      'Long' => '-76.5680227',
                      'Zoom' => '7'
                    ),
                    'Massachusetts' => array(
                      'Lat' => '42.242376',
                      'Long' => '-71.5200644',
                      'Zoom' => '7.25'
                    ),
                    'Michigan' => array(
                      'Lat' => '43.4714988',
                      'Long' => '-84.570548',
                      'Zoom' => '6'
                    ),
                    'Minnesota' => array(
                      'Lat' => '45.4338368',
                      'Long' => '-93.7186276',
                      'Zoom' => '6'
                    ),

                    'Mississippi' => array(
                      'Lat' => '32.7371908',
                      'Long' => '-89.637214',
                      'Zoom' => '5.5'
                    ),
                    'Missouri' => array(
                      'Lat' => '38.5574644',
                      'Long' => '-92.6467589',
                      'Zoom' => '6'
                    ),
                    'Montana' => array(
                      'Lat' => '46.7956792',
                      'Long' => '-109.7246387',
                      'Zoom' => '5.25'
                    ),
                    'Nebraska' => array(
                      'Lat' => '41.6769824',
                      'Long' => '-99.404067',
                      'Zoom' => '5.75'
                    ),
                    'Nevada' => array(
                      'Lat' => '38.9001907',
                      'Long' => '-117.0441186',
                      'Zoom' => '5'
                    ),
                    'New Hampshire' => array(
                      'Lat' => '43.4990815',
                      'Long' => '-71.7684053',
                      'Zoom' => '7'
                    ),
                    'New Jersey' => array(
                      'Lat' => '39.931762',
                      'Long' => '-74.5142079',
                      'Zoom' => '7.5'
                    ),
                    'New Mexico' => array(
                      'Lat' => '34.4954588',
                      'Long' => '-106.0426724',
                      'Zoom' => '5'
                    ),
                    'New York' => array(
                      'Lat' => '42.3309017',
                      'Long' => '-74.959544',
                      'Zoom' => '6'
                    ),
                    'North Carolina' => array(
                      'Lat' => '35.4588101',
                      'Long' => '-79.8610339',
                      'Zoom' => '6'
                    ),
                    'North Dakota' => array(
                      'Lat' => '47.4619012',
                      'Long' => '-100.5084277',
                      'Zoom' => '5.5'
                    ),
                    'Ohio' => array(
                      'Lat' => '40.2403533',
                      'Long' => '-82.8634441',
                      'Zoom' => '6'
                    ),
                      'Oklahoma' => array(
                        'Lat' => '35.5367729',
                        'Long' => '-98.129378',
                        'Zoom' => '6'
                      ),
                      'Oregon' => array(
                        'Lat' => '43.9703232',
                        'Long' => '-120.1425329',
                        'Zoom' => '5.5'
                      ),
                      'Pennsylvania' => array(
                        'Lat' => '40.9863817',
                        'Long' => '-77.3062824',
                        'Zoom' => '6.25'
                      ),
                      'Rhode Island' => array(
                        'Lat' => '41.7033794',
                        'Long' => '-71.492069',
                        'Zoom' => '8.5'
                      ),
                      'South Carolina' => array(
                        'Lat' => '33.9108507',
                        'Long' => '-80.8177439',
                        'Zoom' => '6'
                      ),
                      'South Dakota' => array(
                        'Lat' => '44.5260213',
                        'Long' => '-100.0837597',
                        'Zoom' => '6'
                      ),
                      'Tennessee' => array(
                        'Lat' => '35.8996938',
                        'Long' => '-86.4556571',
                        'Zoom' => '5.5'
                      ),
                      'Texas' => array(
                        'Lat' => '31.5405117',
                        'Long' => '-98.2721205',
                        'Zoom' => '5'
                      ),
                      'Utah' => array(
                        'Lat' => '39.6146107',
                        'Long' => '-111.269028',
                        'Zoom' => '6'
                      ),
                      'Vermont' => array(
                        'Lat' => '43.8208123',
                        'Long' => '-72.4993428',
                        'Zoom' => '7'
                      ),
                      'Virginia' => array(
                        'Lat' => '37.7485834',
                        'Long' => '-78.32692',
                        'Zoom' => '6.5'
                      ),
                      'Washington' => array(
                        'Lat' => '47.4491452',
                        'Long' => '-120.570026',
                        'Zoom' => '5.5'
                      ),
                      'West Virginia' => array(
                        'Lat' => '38.5532073',
                        'Long' => '-80.6269095',
                        'Zoom' => '6.5'
                      ),
                      'Wisconsin' => array(
                        'Lat' => '44.7363728',
                        'Long' => '-89.9372306',
                        'Zoom' => '5.5'
                      ),
                      'Wyoming' => array(
                        'Lat' => '43.0004198',
                        'Long' => '-107.5601109',
                        'Zoom' => '5.5'
                      )
                  );

                    /* Pull relevant data from the array based on the given state */
                        $state_coords_lat = $StateDroneLaw_airmap_data[$current_state_name]['Lat'];
                        $state_coords_long = $StateDroneLaw_airmap_data[$current_state_name]['Long'];
                        $state_coords_zoom = $StateDroneLaw_airmap_data[$current_state_name]['Zoom'];

                      ?>

                      <script>
                        /* Pass the php variables into javascript */
                        /* Need to look into wp_localize_script() function to eventually replace this */

                        var state_lat = '<?php echo $state_coords_lat ; ?>';
                        var state_long = '<?php echo $state_coords_long ; ?>';
                        var state_zoom = '<?php echo $state_coords_zoom ; ?>';

                        /* AirMap function to create new map object in the page */
                        /* API key provided via StateDroneLaw developer account */
                        var map = new Airmap.Map('eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJjcmVkZW50aWFsX2lkIjoiY3JlZGVudGlhbHwyR2QzRHo5Rm1HTUpnYUZEYnE0ZDVjeGV2THhBIiwiYXBwbGljYXRpb25faWQiOiJhcHBsaWNhdGlvbnxvS01lem15Q1FZb1E5cEh6THZOMGVJWHhveURYIiwib3JnYW5pemF0aW9uX2lkIjoiZGV2ZWxvcGVyfEd3QmxwOTlTMFhhNEU4ZkE2M01lZ1RYdzdYeVciLCJpYXQiOjE0Nzk4NDE4MzB9.k-sdvuxVdQrZIQuUqGGv3zfm-GUi_TjxnG4a-BPcwTM', {
                          container: 'map',
                          center: [ state_lat , state_long ], /* State-specific map coordinate variables established above */
                          layers: [ 'airports_recreational', 'heliports', 'class_b', 'class_c', 'class_d', 'class_e0', 'sua_prohibited', 'sua_restricted', 'national_parks', 'noaa', 'power_plants', 'tfrs', 'wildfires' ],
                          theme: 'standard',
                          zoom: state_zoom, /* State-specific default zoom size variables established above */
                          pitch: 0,
                          bearing: 0,
                          hash: false,
                          interactive: true,
                          showControls: true,
                          useLocation: false,
                          showSearch: false,
                          createFlights: false,
                          tileServiceUrl:"https://api.airmap.com/maps/v4/tilejson",
                          webAppUrl:"https://app.airmap.io",
                        });
                      </script>
                    </div><!-- div id="map" -->

            <p class="map-credit">Map powered by <a href="http://www.airmap.com">AirMap</a>, the world’s leading airspace services platform for drones.</p>
            <?php echo do_shortcode('[tabbyending]'); ?>

          </div> <!-- container -->
          <!-- End AirMap -->

        <?php endif;  ?> <!-- have_posts() -->


    </div> <!-- state-info -->
    </div><!-- col -->

<?php
get_sidebar();
get_footer();
