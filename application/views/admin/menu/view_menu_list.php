<div class="dd">
    <ol class="dd-list">
        <?php foreach ($parents as $row) { ?>
        <li class="dd-item" data-id="<?php echo $row['data']['menu_id'] ?>">
            <div class="dd-handle">
                <?php echo $row['data']['menu_name'] ?> (<?php echo menuTypeText($row['data']['menu_type']) ?>)

                <div class="btn-nestable btn-group">
                    <a class="btn btn-primary btn-xs">Edit</a>
                    <a class="btn btn-danger btn-xs">Delete</a>
                </div>
            </div>

            <!-- Level 2 -->
            <?php if (count($row['children']) > 0) { ?>
                <ol class="dd-list">
                    <?php foreach ($row['children'] as $row2) { ?>
                    <li class="dd-item" data-id="<?php echo $row2['data']['menu_id'] ?>">
                        <div class="dd-handle">
                            <?php echo $row2['data']['menu_name'] ?> (<?php echo menuTypeText($row2['data']['menu_type']) ?>)

                            <div class="btn-nestable btn-group">
                                <a class="btn btn-primary btn-xs">Edit</a>
                                <a class="btn btn-danger btn-xs">Delete</a>
                            </div>
                        </div>

                        <!-- Level 3 -->
                        <?php if (count($row2['children']) > 0) { ?>
                            <ol class="dd-list">
                                <?php foreach ($row2['children'] as $row3) { ?>
                                    <li class="dd-item" data-id="<?php echo $row3['data']['menu_id'] ?>">
                                        <div class="dd-handle">
                                            <?php echo $row3['data']['menu_name'] ?> (<?php echo menuTypeText($row3['data']['menu_type']) ?>)

                                            <div class="btn-nestable btn-group">
                                                <a class="btn btn-primary btn-xs">Edit</a>
                                                <a class="btn btn-danger btn-xs">Delete</a>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ol>
                        <?php } ?>

                    </li>
                    <?php } ?>
                </ol>
            <?php } ?>
        </li>
        <?php } ?>
    </ol>
</div>

<script type="text/javascript">
    (function() {
        loadNestable();
    })();
</script>