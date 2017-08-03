<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit(403);
}

delete_option('kt_color_grid_customizer');
delete_option('kt_color_grid_block_size');
delete_option('kt_color_grid_palette');
delete_option('kt_color_grid_version');
delete_option('kt_color_grid_spread');
delete_option('kt_color_grid_clamps');
delete_option('kt_color_grid_blocks');
delete_option('kt_color_grid_visual');
delete_option('kt_color_grid_clamp');
delete_option('kt_color_grid_luma');
delete_option('kt_color_grid_cols');
delete_option('kt_color_grid_rows');
delete_option('kt_color_grid_type');
