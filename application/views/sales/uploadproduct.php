<?php echo form_open("main/product"); ?>
    <p>
        <label for="product_name">Product Name:</label>
        <input type="text" id="productname" name="productname"       value="<?php echo set_value('product_name'); ?>" />
    </p>        


    <p>
        <label for="ProductCode">Product Code</label>
        <input type="text" id="productcode" name="productcode" value="<?php echo set_value('productcode'); ?>" />
    </p>
    <p>
        <label for="productprice">Product Price:</label>
        <input type="text" id="productprice" name="productprice" value="<?php echo set_value('productprice'); ?>" />
    </p>
    <p>
        <label for="Quantity">Quantity:</label>
        <select name="quantity" id="quantity" value="<?php echo set_value('quantity'); ?>" /><option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>

    </p>  
    <p>
        <label for="Uploadimage">Upload Image:</label>
        <input type="file" name="uploadimage" id="uploadimage" value="<?php echo set_value('uploadimage'); ?>" />
    </p>

    <p>
        <input type="submit" class="greenButton" value="submit" />
    </p>
<?php echo form_close(); ?>