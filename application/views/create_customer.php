<a href="<?php echo site_url('user_authentication/user_login_process'); ?>">Back</a>
<?php echo form_open('user_authentication/create_customer'); ?>    
    <table>
        <tr>
            <td><label for="customer_name">Customer Name</label></td>
            <td><input type="input" name="customer_name" size="32" /></td>
        </tr>
        <tr>
            <td><label for="customer_type">Customer Type</label></td>
            <td>
                <select name="customer_type">
                    <option value="t1">1-10</option>
                    <option value="t2">11-20</option>
                    <option value="t3">21-30</option>
                    <option value="b1">B+1</option>
                    <option value="b2">B+2</option>
                    <option value="ano">Anomali</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="phone_number">Phone number</label></td>
            <td><input type="input" name="phone_number" size="32" /></td>
        </tr>
        <tr>
            <td><label for="address">Address</label></td>
            <td><input type="text" name="address" size="32"></td>
        </tr>
        <tr>
            <td><label for="note">Note</label></td>
            <td><input type="text" name="note" size="32"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Register" /></td>
        </tr>
    </table>    
</form>