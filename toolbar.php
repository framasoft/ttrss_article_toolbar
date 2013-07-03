<?php
global $link;

echo stylesheet_tag("plugins/framarticle_toolbar/css/font-awesome.css");
print_user_stylesheet($link);

if (defined('SUPPORT_FRAMASOFT') && SUPPORT_FRAMASOFT) {
?>
<button class="button_nav" title="Soutenir Framasoft" onclick="show_gift_dialog()">
<i class="icon-heart"></i></button>
<?php
}
?>

<button class="button_nav" title="S'abonner au flux" onclick="quickAddFeed()">
<i class="icon-plus"></i></button>

<button class="button_nav" title="Développer/réduire les articles" onclick="toggle_cdm_expanded()">
<i class="icon-th-list"></i></button>

<button class="button_nav" title="Marquer les articles comme lus" onclick="catchupCurrentFeed()">
<i class="icon-eye-open"></i></button>

<button class="button_nav" title="Rafraîchir le flux" onclick="viewCurrentFeed()">
<i class="icon-refresh"></i></button>

<button class="button_nav" title="Article précédent" onclick="moveToPost('prev',true)">
<i class="icon-arrow-up"></i></button>

<button class="button_nav" title="Prochain article" onclick="moveToPost('next',true)">
<i class="icon-arrow-down"></i></button>
