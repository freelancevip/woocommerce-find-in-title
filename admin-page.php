<?php defined( 'ABSPATH' ) || exit(); ?>
<?php $options = $this->options->get(); ?>
<div id="wrap">
    <h1>Woocommerce find in title settings</h1>
    <p>Ищет совпадение в названии продукта woocommerce слово word. Если найдено - добавляет к описанию текст text.</p>
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
                                    <td class="wfit-paddingless"><p><b><?php echo $item['word'] ?></b></p></td>
                                    <td class="wfit-paddingless"><a href="#" class="wfit-edit">Edit</a></td>
                                    <td class="wfit-paddingless"><a href="#" class="wfit-delete">Delete</a></td>
                                </tr>
                                <tr style="display: none" class="wfit-close">
                                    <td class="wfit-paddingless">
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
                                    <td class="wfit-paddingless"></td>
                                    <td class="wfit-paddingless"></td>
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
                    class="widefat"
                    placeholder="Word(s)"><br><br>
            <textarea
                    name="items[<?php echo $index ?>][text]"
                    class="widefat"
                    rows="8"
                    placeholder="Text"></textarea>
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
        padding: 0 10px !important;
    }

    .wfit-inner-table tr td:nth-last-child(1), .wfit-inner-table tr td:nth-last-child(2) {
        width: 50px;
    }

    .wfit-edit, .wfit-delete {
        outline: none;
    }

    .wfit-edit:focus, .wfit-delete:focus {
        box-shadow: none;
    }

    .wfit-inner-table.active td {
        background: #eaeaea;
    }

    .wfit-inner-table.active tr:last-child td {
        padding-bottom: 10px !important;
    }
</style>