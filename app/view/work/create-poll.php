<div id="content">
    <h1>Lắng nghe ý kiến của mọi người</h1>
    <form method="POST" enctype="multipart/form-data" action="<?php echo URLROOT . '/poll/add'; ?>">
        <input type="text" name="title" placeholder="Vấn đề" required>
        <ul id="list-options">
            <li class="option">
                <input type="text" name="option_1" value="Option 1">
                <span id="remove-1">&#x2715;</span>
            </li>
        </ul>
        <button type="button" id="btn-add-option">Thêm lựa chọn</button>
        <button type="submit" id="post">Chia sẻ ngay</button>
    </form>
</div>