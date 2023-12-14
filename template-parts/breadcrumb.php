<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Template Part for Displaying Breadcrumb Section page template.
 */
?>
<!-- Breadcrumb Section -->
<section id="breadcrumb-section-wrapper">
        <div class="container p-0">
            <div class="row m-0">
                <div class="breadcrumb-section">
                    <div class="col-12 p-0">
                        <div class="breadcrumb-heading text-center" data-aos="zoom-in">
                            <h1>Portfolio</h1>
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="breadcrumb-wrapper">
                            <?php 
                                boxshadow_breadcrumb( array(
                                    'container'        => 'ul',
                                    'container_id'     => 'breadcrumb',
                                    'container_class'  => 'breadcrumb justify-content-center',
                                    'item'             => 'li',
                                    'item_class'       => '',
                                    'anchor_class'     => '',
                                    'separator'        => false,
                                    'active_class'     => 'active',
                                    'echo'             => true,
                                ) );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
