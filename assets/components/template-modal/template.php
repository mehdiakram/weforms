<div>
    <wpuf-modal :show.sync="show" :onClose="onClose">
        <h2 slot="header">
            <?php _e( 'Select a Template', 'weforms' ); ?>
            <small><?php printf( __( 'Select from a pre-defined template or from a <a href="#" %s>blank form</a>', 'weforms' ), '@click.prevent="blankForm()"' ); ?></small>
        </h2>

        <div slot="body">
            <ul>
                <li class="blank-form">
                    <a href="#" @click.prevent="blankForm($event.target)">
                        <span class="dashicons dashicons-plus"></span>
                        <div class="title"><?php _e( 'Blank Form', 'weforms' ); ?></div>
                    </a>
                </li>

                <?php
                $registry = weforms_get_form_templates();

                foreach ($registry as $key => $template ) {
                    $class = 'template-active';
                    $title = '';

                    if ( ! $template->is_enabled() ) {
                        $class = 'template-inactive';
                        $title = __( 'This integration is not installed.', 'weforms' );
                    }
                    ?>

                    <li>
                        <a href="#" @click.prevent="createForm('<?php echo $key; ?>', $event.target)" title="<?php echo esc_attr( $title ); ?>">
                            <div class="title"><?php echo $template->get_title(); ?></div>
                            <div class="description"><?php echo $template->get_description(); ?></div>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </wpuf-modal>
</div>