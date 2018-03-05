<?php defined( 'ABSPATH' ) || exit(); ?>
<?php $options = $this->options->get(); ?>
<div id="wrap">
    <h1>Woocommerce find in title settings</h1>
    <form method="post">
		<?php if ( $options ) : ?>
            <table class="form-table wfit-outer-table">
                <tbody>
				<?php foreach ( $options as $index => $item ) : ?>
                    <tr>
                        <td class="wfit-paddingless">
                            <table class="form-table wfit-inner-table">
                                <tbody>
                                <tr>
                                    <td><p><b><?php echo $item['word'] ?></b></p></td>
                                    <td><a href="#" class="wfit-edit">Edit</a></td>
                                    <td><a href="#" class="wfit-delete">Delete</a></td>
                                </tr>
                                <tr style="display: none">
                                    <td>
                                        <p><input
                                                    type="text"
                                                    name="items[<?php echo $index ?>][word]"
                                                    value="<?php echo $item['word'] ?>"
                                                    class="widefat">
                                        </p>
                                        <p><textarea
                                                    name="items[<?php echo $index ?>][text]"
                                                    class="widefat"
                                                    rows="8"><?php echo $item['text'] ?></textarea>
                                        </p>
                                        <p><input type="submit" value="Save" class="button button-primary button-large">
                                        </p>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
				<?php endforeach ?>
                </tbody>
            </table>
		<?php endif ?>
        <h3>New element</h3>

		<?php $index ++ ?>

        <div>
            <input
                    type="text"
                    name="items[<?php echo $index ?>][word]"
                    value=""
                    class="widefat"><br><br>
            <textarea
                    name="items[<?php echo $index ?>][text]"
                    class="widefat"
                    rows="8"></textarea>
        </div>
        <input type="submit" value="Save" class="button button-primary button-large">
		<?php echo wp_nonce_field( 'wfit_nonce' ); ?>
    </form>
</div>
<style>
    #wrap {
        padding-right: 20px;
    }

    .wfit-paddingless {
        padding: 0 !important;
    }

    .wfit-inner-table tr td:nth-last-child(1), .wfit-inner-table tr td:nth-last-child(2) {
        width: 50px;
    }
</style>