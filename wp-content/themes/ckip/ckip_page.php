<?php
/*
Template Name: CKiP Home Page
*/
?>

<?php get_header(); ?>

<h1 class="home-head posts-main-btn">Aktualności</h1>

<div class="block-posts-categories">
    <div class="col-6 block block-ckip-btn background-ckip">
        <span class="block-title">Centrum Kultury</span>
    </div>
    <div class="col-6">
        <div class="row block block-library-btn background-library">
            <span class="block-title">Biblioteka</span>
        </div>
        <div class="row block block-marathon-btn background-marathon">
            <span class="block-title">Maraton</span>
        </div>
    </div>
</div>
<div class="block-posts block-ckip background-ckip" style="display: none;">Sample ckip</div>
<div class="block-posts block-library background-library" style="display: none;">Sample library</div>
<div class="block-posts block-marathon background-marathon" style="display: none;">Sample marathon</div>

<?php get_footer(); ?>