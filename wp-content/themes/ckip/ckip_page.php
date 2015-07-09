<?php
/*
Template Name: CKiP Home Page
*/
?>

<?php get_header(); ?>

<script type="text/x-tmpl" id="home-posts-tmpl">
    {% for (var i=0; i < o.length; i++) { %}
        <div class="col-4">
            <p class="title">{%=o[i]['attributes']['title']%}</p>
            <span class="content">{%#o[i]['attributes']['content']%}</span>
        </div>
    {% } %}
</script>

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
<div class="block-posts block-ckip background-ckip" style="display: none;"></div>
<div class="block-posts block-library background-library" style="display: none;"></div>
<div class="block-posts block-marathon background-marathon" style="display: none;"></div>

<?php get_footer(); ?>