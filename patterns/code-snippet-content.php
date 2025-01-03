<?php
/**
 * Title: Code Snippet Content Structure
 * Slug: fsetips/code-snippet-content
 * Categories: fsetips
 * Description: Standard layout for code snippet posts with introduction, code block, and implementation details.
 */
?>

<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--40)">
    <!-- wp:column {"width":"70%"} -->
    <div class="wp-block-column" style="flex-basis:70%">
        <!-- wp:paragraph {"className":"snippet-introduction"} -->
        <p class="snippet-introduction">Add your introduction here explaining what this code snippet does and when to use it.</p>
        <!-- /wp:paragraph -->

        <!-- wp:fsetips/fsetips-code-block -->
        <div class="wp-block-fsetips-fsetips-code-block">
            <div class="fsetips-code-block">
                <div class="fsetips-code-header">
                    <span class="language-label">PHP</span>
                    <button type="button" class="copy-button">Copy</button>
                </div>
                <pre class="language-php line-numbers"><code class="language-php">// Add your code here</code></pre>
            </div>
        </div>
        <!-- /wp:fsetips/fsetips-code-block -->

        <!-- wp:heading {"style":{"spacing":{"marginTop":"var:preset|spacing|40"}}} -->
        <h2 class="wp-block-heading" style="font-weight:600">Notes & Considerations</h2>
        <!-- /wp:heading -->

        <!-- wp:list {"className":"snippet-notes"} -->
        <ul class="snippet-notes">
            <li>Add important notes, considerations, or caveats about using this code</li>
            <li>Include any potential limitations or dependencies</li>
            <li>Mention alternative approaches if applicable</li>
        </ul>
        <!-- /wp:list -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"width":"30%"} -->
    <div class="wp-block-column" style="flex-basis:30%">
        <!-- wp:group {"style":{"spacing":{"padding":{"top":"1.8rem","bottom":"1.8rem","left":"1.8rem","right":"1.8rem"}},"backgroundColor":"light","border":{"radius":"0.5rem"}},"className":"snippet-meta-box","layout":{"type":"constrained"}} -->
        <div class="wp-block-group snippet-meta-box has-light-background-color has-background" style="border-radius:0.5rem;padding:1.8rem">
            <!-- wp:image {"style":{"spacing":{"margin":{"bottom":"1.5rem"}},"border":{"radius":"0.375rem","width":"1px"}},"backgroundColor":"background","className":"snippet-thumbnail","lightbox":{"enabled":true,"showCaption":false},"linkDestination":"none"} -->
            <figure class="wp-block-image has-custom-border snippet-thumbnail" style="margin-bottom:1.5rem;border-radius:0.375rem;border-width:1px"><img class="has-border-color has-background-background-color has-background" alt="" style="border-radius:0.375rem;border-width:1px"/></figure>
            <!-- /wp:image -->
            
            <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600"}},"fontSize":"base"} -->
            <h3 class="wp-block-heading has-base-font-size" style="font-weight:600">Compatibility</h3>
            <!-- /wp:heading -->
            
            <!-- wp:shortcode -->
            [snippet_compatibility]
            <!-- /wp:shortcode -->
            
            <!-- wp:fsetips/implementation-steps -->
            <div class="wp-block-fsetips-implementation-steps">
                <div class="fsetips-implementation-steps">
                    <h3 class="wp-block-heading has-base-font-size" style="font-weight:600">Implementation Steps</h3>
                    <div class="implementation-steps-list"></div>
                </div>
            </div>
            <!-- /wp:fsetips/implementation-steps -->
        </div>
        <!-- /wp:group -->


        <!-- wp:group {"className":"newsletter-sidebar","style":{"spacing":{"padding":{"all":"var:preset|spacing|30","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}},"border":{"radius":"0.5rem"}}} -->
        <div class="wp-block-group newsletter-sidebar" style="border-radius:0.5rem;padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600","fontStyle":"normal"},"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}},"fontSize":"lg"} -->
        <h3 class="wp-block-heading has-lg-font-size" style="margin-bottom:var(--wp--preset--spacing--20);font-style:normal;font-weight:600">Stay Updated
                        </h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"}}} -->
        <p style="font-size:0.875rem">Get the latest FSE tips and tutorials delivered to your inbox.</p>
        <!-- /wp:paragraph -->

        <!-- wp:fsetips/newsletter-signup {"buttonText":"Subscribe","placeholderText":"Your email address","layout":"vertical"} -->
        <div class="wp-block-fsetips-newsletter-signup"><div class="max-w-md"><form id="mailchimp-form" data-mailchimp-form="true" class="flex-col" method="post"><input type="email" name="email" placeholder="Your email address" required/><button type="submit">Subscribe</button></form></div></div>
        <!-- /wp:fsetips/newsletter-signup --></div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"related-snippets","layout":{"type":"constrained"}} -->
            <div class="wp-block-group related-snippets" style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600"}},"fontSize":"base"} -->
            <h3 class="wp-block-heading has-base-font-size" style="font-weight:600">Related Code Snippets</h3>
            <!-- /wp:heading -->

            <!-- wp:query {"queryId":3,"query":{"perPage":10,"postType":"snippet","taxQuery":{"snippet-type":[]},"order":"desc","orderBy":"date","inherit":false}} -->
                <div class="wp-block-query">
                <!-- wp:post-template {"layout":{"type":"default"}} -->
                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|5","bottom":"var:preset|spacing|5"}}}} -->
                <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5)"><!-- wp:post-title {"isLink":true,"fontSize":"base"} /-->

                <!-- /wp:group -->
                <!-- /wp:post-template -->


                <!-- wp:query-no-results -->
                <!-- wp:heading {"level":4,"style":{"typography":{"fontWeight":"500"}},"fontSize":"small"} -->
                <h4 class="wp-block-heading has-small-font-size" style="font-weight:500">Latest Code Snippets</h4>
                <!-- /wp:heading -->

                <!-- wp:query {"queryId":1,"query":{"perPage":3,"postType":"snippet","order":"desc","orderBy":"date","inherit":false}} -->
                <div class="wp-block-query">
                    <!-- wp:post-template {"layout":{"type":"default"}} -->
                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|5","bottom":"var:preset|spacing|5"}}}} -->
                    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5)">
                        <!-- wp:post-title {"isLink":true,"fontSize":"base"} /-->
                    </div>
                    <!-- /wp:group -->
                    <!-- /wp:post-template -->
                </div>
                <!-- /wp:query -->
                <!-- /wp:query-no-results -->
            
            <!-- /wp:query --></div>
        <!-- /wp:group -->

    <!-- /wp:column -->
</div>
<!-- /wp:columns -->


