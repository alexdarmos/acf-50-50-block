<!-- •	Option have image or video
	•	Option to have an overlay
	•	Option to choose overlay color and opacity 
	•	If it is a video it will just pop up to view full video
	•	Choose image/video rim color (examples are showing red and blue)
	•	Choose what side the image is on (left or right)
	•	Option to choose top and bottom padding in px
	•	Choose background color
	•	Choose text color gray or white
	•	Text and buttons/accordions shortcodes will all be in a wysiwyg -->

<?php 
$mediaType = get_sub_field('media-type'); /*Type: select*/
$image = get_sub_field('image'); /*Type: image (url)*/
$videoId = get_sub_field('video-id'); /*Type: Text*/
$videoThumb = get_sub_field('video-thumbnail'); /*Type: image (url)*/
$overlayColor = get_sub_field('overlay-color'); /*Type: color picker*/
$overlayOpacity = get_sub_field('overlay-opacity'); /*Type: range*/
$mediaShadowColor = get_sub_field('media-shadow-color'); /*Type: color picker*/
$mediaPosition = get_sub_field('media-position'); /*Type: select*/
$paddingTop = get_sub_field('padding-top'); /*Type: number*/
$paddingBottom = get_sub_field('padding-bottom'); /*Type: number*/
$backgroundColor = get_sub_field('background-color'); /*Type: color picker*/
$textColor = get_sub_field('text-color'); /*Type: color*/
$textContent = get_sub_field('text-content'); /*Type: wysiwyg editor*/
?>

<style>
    .fifty-fifty-block {
        background: <?php echo $backgroundColor; ?>;
        color: <?php echo $textColor; ?>;
    }

    .media-content::after {
        background: <?php echo $overlayColor; ?>;
        opacity: <?php echo $overlayOpacity ?>;
    }

    .media-content::before {
	content: '';
	position: absolute;
	z-index: 1;
	width: calc(100% + 21px);
	height: 100%;
	margin-bottom: 20px;
    }

    .media-right .media-content::before {
        box-shadow: <?php echo $mediaShadowColor; ?> -21px 20px 0px 0px;
        border-radius: 10px 0 0 10px;
    }

    .media-left .media-content::before {
        box-shadow: <?php echo $mediaShadowColor; ?> 21px 20px 0px 0px;
        border-radius: 0 10px 10px 0;
        left: -21px;
    }
</style>

<div class="fifty-fifty-block <?php echo ($mediaPosition === "left" ? "media-left" : "media-right"); ?>" style="padding-top: <?php echo $paddingTop;?>px; padding-bottom: <?php echo $paddingBottom; ?>px;">
    <!--  Start Image/Video Content -->
    <?php if ($mediaType === "image") : ?>
        <div class="media-content image-content" style="background: url('<?php echo $image ;?>'); background-size: cover; background-repeat: no-repeat; background-position: right;"></div>
    <?php else : ?>
        <!-- popup video utilizing plugin for lightbox popup-- not sure if preferred library or hardcoded method-->
        <div class="media-content image-content" style="background: url('<?php echo $videoThumb ;?>'); background-size: cover; background-repeat: no-repeat; background-position: right;">
            <a href="https://www.youtube.com/watch?v=<?php echo $videoId; ?>" class="wp-video-popup video-content"></a>
        </div>
    <?php endif; ?>

    <!-- Start WYSIWYG Content -->
    <div class="text-content">
        <?php echo $textContent; ?>
    </div>

</div>