<h1>Subscribers</h1><br>
<?php if (!empty($subscribers)) { ?>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Email</th>
                            <th>Synced</th>
                        </tr>
                        <?php foreach ($subscribers as $value) { ?>
                            <tr>
                                <td><?php echo $value->email; ?></td>
                                <td>
                                    <?php if($value->synced === 0) { ?>
                                    No
                                    <?php } else { ?>
                                        Yes
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else {
                echo 'No subscribers found';
            } ?>
