<div id="search-container" class="search-container">

    <!-- SEARCH ICON  -->
    <div class="search-icon">
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             width="22px" height="22px" viewBox="0 0 485.213 485.213" style="enable-background:new 0 0 485.213 485.213;"
             xml:space="preserve">
            <g>
                <path fill="000" d="M363.909,181.955C363.909,81.473,282.44,0,181.956,0C81.474,0,0.001,81.473,0.001,181.955s81.473,181.951,181.955,181.951
                    C282.44,363.906,363.909,282.437,363.909,181.955z M181.956,318.416c-75.252,0-136.465-61.208-136.465-136.46
                    c0-75.252,61.213-136.465,136.465-136.465c75.25,0,136.468,61.213,136.468,136.465
                    C318.424,257.208,257.206,318.416,181.956,318.416z"/>
                <path fill="000" d="M471.882,407.567L360.567,296.243c-16.586,25.795-38.536,47.734-64.331,64.321l111.324,111.324
                    c17.772,17.768,46.587,17.768,64.321,0C489.654,454.149,489.654,425.334,471.882,407.567z"/>
            </g>
        </svg>

    </div>

    <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">

            <!--        <span class="screen-reader-text">--><?php //echo _x( 'Search for:', 'label' ) ?><!--</span>-->
            <input type="search" id="search-field" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"  name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />

        <input type="submit" class="search-submit" value="" />
    </form>
</div>


