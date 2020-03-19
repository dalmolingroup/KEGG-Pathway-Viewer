<?php

    // Check if the pathway code was informed
    if ( isset($_GET['pathwayCode']) && strcmp($_GET['pathwayCode'], "") != 0 )
    {
        // Get the pathway code
        $pathway_code = encrypt_decrypt('decrypt', $_GET['pathwayCode']);

        // Load pathway information
        $pathway_info = $pathway_model->get_pathway_info($pathway_code);
        $pathway_info = $pathway_info[0];

        // Find the network file name
        $network_filename = '';

        foreach (glob(NETWORK_ABSPATH . "*" . $pathway_info["code"] . ".*") as $filename) {  
            $network_filename = basename($filename);
        }
    }
    else
    {
        ?><script>alert("There is an error related to the pathway code. Please try again.");
        window.location.href = "<?php echo HOME_URI; ?>";</script> <?php
        return false;
    }

?>

<!-- Page content -->
<div id="page-content">
    <!-- Dashboard Header -->
    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
    <div class="content-header content-header-media">
        <div class="header-section">
            <div class="row">
                <!-- Main Title (hidden on small devices for the statistics to fit) -->
                <div class="col-md-4 col-lg-6">
                    <h1><?php echo $pathway_info["code"]; ?> <strong><?php echo $pathway_info["name"]; ?></strong><br>
                    <small><strong><?php echo $pathway_info["class"]; ?></small></strong></h1>
                    <small><?php echo $pathway_info["description"]; ?></small></h1>
                </div>
                <!-- END Main Title -->

                <!-- Top Stats -->
                <div class="col-md-8 col-lg-6 hidden-xs hidden-sm">
                    <div class="row text-center">
                        <div class="col-xs-4 col-sm-3">
                            <h2 class="animation-hatch">
                                <strong><?php echo $pathway_info["eukaryotes_count"]; ?></strong><br>
                                <small>EUKARYOTES</small>
                            </h2>
                        </div>
                        <div class="col-xs-4 col-sm-3">
                            <h2 class="animation-hatch">
                            <strong><?php echo $pathway_info["prokaryotes_count"]; ?></strong><br>
                                <small>PROKARYOTES</small>
                            </h2>
                        </div>
                        <div class="col-xs-4 col-sm-3">
                            <h2 class="animation-hatch">
                            <strong><?php echo $pathway_info["animals_count"]; ?></strong><br>
                                <small>ANIMALS</small>
                            </h2>
                        </div>
                        <!-- We hide the last stat to fit the other 3 on small devices -->
                        <div class="col-sm-3 hidden-xs">
                            <h2 class="animation-hatch">
                            <strong><?php echo $pathway_info["plants_count"]; ?></strong><br>
                                <small>PLANTS</small>
                            </h2>
                        </div>
                        <div class="col-sm-3 hidden-xs">
                            <h2 class="animation-hatch">
                            <strong><?php echo $pathway_info["fungi_count"]; ?></strong><br>
                                <small>FUNGI</small>
                            </h2>
                        </div>
                        <div class="col-sm-3 hidden-xs">
                            <h2 class="animation-hatch">
                            <strong><?php echo $pathway_info["protists_count"]; ?></strong><br>
                                <small>PROTISTS</small>
                            </h2>
                        </div>
                        <div class="col-sm-3 hidden-xs">
                            <h2 class="animation-hatch">
                            <strong><?php echo $pathway_info["bacteria_count"]; ?></strong><br>
                                <small>BACTERIA</small>
                            </h2>
                        </div>
                        <div class="col-sm-3 hidden-xs">
                            <h2 class="animation-hatch">
                            <strong><?php echo $pathway_info["archaea_count"]; ?></strong><br>
                                <small>ARCHAEA</small>
                            </h2>
                        </div>
                        
                        <div class="col-sm-12 hidden-xs">
                            <button type="button" class="btn btn-block btn-danger" onclick="$('#modal-network-info').modal('show');">
                                Click here to see the pathway information
                            </button>
                        </div>
                    </div>
                </div>
                <!-- END Top Stats -->
            </div>
        </div>
        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
        <img src="<?php echo HOME_URI;?>/assets/img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow">
    </div>
    <!-- END Dashboard Header -->

    <!-- Widgets Row -->
    <div class="row">
        <div class="col-md-12">
            <!-- Timeline Widget -->
            <div class="widget">
                <div class="widget-extra themed-background-dark">
                    <h3 class="widget-content-light">
                        Pathway <strong>Viewer</strong>
                    </h3>
                </div>
                <div class="widget-extra">
                    <!-- Iframe with pathway visualization -->
                    <iframe id="networkIframe" class="iframe-network-viewer" frameBorder="0"
                        src="<?php echo HOME_URI . '/resources/networks/' . $network_filename;?>"></iframe>
                    <!-- END Iframe with pathway visualization -->
                </div>
            </div>
            <!-- END Timeline Widget -->
        </div>
    </div>
    <!-- END Widgets Row -->
</div>
<!-- END Page Content -->

<?php include ABSPATH . '/views/_includes/page_footer.php'; ?>
<?php include ABSPATH . '/views/_includes/template_scripts.php'; ?>

<!-- Google Maps API Key (you will have to obtain a Google Maps API key to use Google Maps) -->
<!-- For more info please have a look at https://developers.google.com/maps/documentation/javascript/get-api-key#key -->
<script src="https://maps.googleapis.com/maps/api/js?key="></script>
<script src="<?php echo HOME_URI;?>/assets/js/helpers/gmaps.min.js"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="<?php echo HOME_URI;?>/assets/js/pages/index.js"></script>
<script>$(function(){ Index.init(); });</script>