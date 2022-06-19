<?php

$BASE_PATH_IMAGE = 'image';

return [
    'image' => [
        'profile' => $BASE_PATH_IMAGE . '/profile/',
        'posts' => $BASE_PATH_IMAGE . '/posts/',
        'products' => $BASE_PATH_IMAGE . '/products/',
    ],
    'type' => [
        'post',
        'product'
    ],

    'owner' => [
        'all' => 0,
        'none' => -1, 
    ],

    'category' => [
        'all' => 0,
    ],

    'author' => [
        'all' => 0,
    ],

    'tag' => [
        'all' => 0,
    ],

    'category_reference' => [
        'name' => 'Tài liệu tham khảo',
        'parent_id' => 0,
        'type' => 'post'
    ],
    'post_reference' => [
        [
            'title' => 'Tóm tắt về quyền tác giả (QTG)',
            'user_id' => '1',
            'created_at' => now(),
            'content' =>
            '<p class="MsoListParagraphCxSpFirst" style="text-indent:-.25in;mso-list:l0 level1 lfo1"><!--[if !supportLists]--><b><span style="font-size:13.0pt;line-height:107%;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US">1.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
            </span></span></b><!--[endif]--><b><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Tóm tắt về quyền tác giả (QTG):<o:p></o:p></span></b></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle" style="text-indent:-.25in;mso-list:l2 level1 lfo2"><!--[if !supportLists]--><span style="font-size:13.0pt;line-height:107%;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US">1)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
            </span></span><!--[endif]--><i><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Quyền tác giả (QTG)</span></i><span style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US">, tiếng Anh
            là <i>Copyrights</i>, là một loại quyền đối với các <i>tác phẩm sáng tạo</i>
            trong các lĩnh vực văn học, nghệ thuật và khoa học.<o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle" style="text-indent:-.25in;mso-list:l2 level1 lfo2"><!--[if !supportLists]--><span style="font-size:13.0pt;line-height:107%;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US">2)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
            </span></span><!--[endif]--><i><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Tác phẩm sáng tạo</span></i><span style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US">, tiếng Anh
            là <i>Creative Works</i>, hoặc nói gọn là <i>Tác phẩm (Works)</i>, là thành quả
            lao động sáng tạo (trí óc) của nhà văn, nhà thơ, nghệ sĩ, nhạc sĩ, nhà khoa học,
            lập trình viên, và những người làm công việc sáng tạo khác, gọi chung là các <i>Tác
            giả (Author)</i>.<o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Tác phẩm sáng tạo phải có hai yếu tố cơ bản: là
            tác phẩm <i>nguyên gốc</i> (không phải sao chép lại), và <i>có tính mới (sáng tạo)</i>.<o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Tác phẩm là <i>tài sản trí tuệ</i> của tác giả. Thuật
            ngữ <i>Sở hữu trí tuệ (SHTT)</i> là dịch từ tiếng Anh <i>Intellectual property
            (IP)</i>. <i>IP </i>có thể dịch sang tiếng Việt thành “<i>tài sản trí tuệ</i>”,
            tuy vậy thuật ngữ <i>“sở hữu trí tuệ”</i> đã được dùng quen.&nbsp;&nbsp; <o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle" style="text-indent:-.25in;mso-list:l2 level1 lfo2"><!--[if !supportLists]--><span style="font-size:13.0pt;line-height:107%;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US">3)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
            </span></span><!--[endif]--><i><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Luật pháp bảo vệ</span></i><span style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US"> tác phẩm, giống
            như bảo vệ tài sản trí tuệ và các loại tài sản nói chung khác.&nbsp; <br>
            <br>
            Để làm được việc đó Luật pháp xác định các <i>quyền (right) </i>đối với tác phẩm,
            tức các QTG. Đồng thời quy định các điều khoản để <i>bảo hộ (protect) </i>các
            quyền đó.<br>
            <br>
            Có hai loại QTG: <o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle" style="margin-left:.75in;mso-add-space:
            auto;text-indent:-.25in;mso-list:l1 level1 lfo3"><!--[if !supportLists]--><span style="font-size:13.0pt;line-height:107%;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US">-<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </span></span><!--[endif]--><i><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">quyền nhân thân</span></i><span style="font-size:
            13.0pt;line-height:107%;mso-ansi-language:EN-US"> (hay quyền đạo đức / tinh thần
            (<i>moral rights</i>) – liên quan trực tiếp đến tác giả, thí dụ: đặt tên cho
            tác phẩm, ghi tên hoặc bút danh; bảo vệ sự toàn vẹn (ngăn cấm việc cắt xén hoặc
            bóp méo) tác phẩm …, và<o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;<o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle" style="margin-left:.75in;mso-add-space:
            auto"><i><span style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US">-
            quyền tài sản</span></i><span style="font-size:13.0pt;line-height:107%;
            mso-ansi-language:EN-US"> (hay quyền kinh tế (<i>economic rights</i>) – liên
            quan đến việc khai thác giá trị kinh tế của tác phẩm, thí dụ: sao chép (làm bản
            sao), chuyển thể, trình diễn, và các quyền khác sẽ nói cụ thể sau.<br>
            <!--[if !supportLineBreakNewLine]--><br>
            <!--[endif]--><o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle" style="text-indent:-.25in;mso-list:l2 level1 lfo2"><!--[if !supportLists]--><span style="font-size:13.0pt;line-height:107%;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US">4)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
            </span></span><!--[endif]--><span style="font-size:13.0pt;line-height:107%;
            mso-ansi-language:EN-US">Trên phạm vị quốc tế QTG được bảo hộ bởi <i>Công ước
            Bern</i> về <i>bảo hộ các tác phẩm văn học nghệ thuật (</i></span><span class="alt-edited"><i><span lang="VI">1886</span></i></span><i><span style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US">)</span></i><span style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US">. Các nước
            tham gia Công ước Bern phải ban hành <i>Luật quốc gia về quyền tác giả</i> để cam
            kết và cụ thể hóa việc bảo hộ tại nước mình. &nbsp;<br>
            <br>
            Việt Nam tham gia Công ước Bern năm </span><span class="alt-edited"><span lang="VI">2007</span></span><span style="font-size:13.0pt;line-height:107%;
            mso-ansi-language:EN-US"> trong quá trình gia nhập Tổ chức thương mại thế giới
            (WTO), và ban hành <i>Luật Sở hữu trí tuệ Việt Nam (Luật SHTT)</i> năm 2005,
            trong đó có một phần về QTG. Luật này được sửa đổi năm 2009 và hiện đang được
            xem xét sửa đổi tiếp cho phù hợp với bối cảnh hội nhập kinh thế thế giới. Dưới
            luật SHTT có các <i>Nghị định</i> của Chính phủ hướng dẫn thi hành. Gần đây nhất
            là Nghị định </span><span lang="VI" style="font-size:12.0pt;line-height:107%;
            mso-fareast-font-family:&quot;Times New Roman&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;;
            color:black">Số: 22/2018/NĐ-CP</span><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">, NĐ này thay thế cho các nghị định tương tự ban
            hành trước đó.<o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle" style="text-indent:-.25in;mso-list:l2 level1 lfo2"><!--[if !supportLists]--><span style="font-size:13.0pt;line-height:107%;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US">5)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
            </span></span><!--[endif]--><span style="font-size:13.0pt;line-height:107%;
            mso-ansi-language:EN-US">&nbsp;Lưu ý trong tên
            tiếng Anh của QTG – <i>copyrights – </i>có hai phần: <i>copy</i> và <i>rights.</i><o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle" style="margin-left:.75in;mso-add-space:
            auto"><i><span style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US">Rights</span></i><span style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US"> – <i>các</i>
            <i>quyền</i>, chỉ ra rằng QTG gồm có <i>nhiều</i> quyền. <o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle" style="margin-left:.75in;mso-add-space:
            auto"><i><span style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US">Copy</span></i><span style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US"> – <i>sao
            chép</i>, chỉ ra rằng các quyền này liên quan đến việc <i>sao chép</i>. <o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle" style="margin-left:.75in;mso-add-space:
            auto"><i><span style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US">&nbsp;</span></i></p><p class="MsoListParagraphCxSpLast"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Hai chi tiết này nói rõ thực chất của QTG, cách dịch
            <i>copyrights</i> sang tiếng Việt thành <i>quyền tác giả</i> không phản ảnh được
            hết ngữ nghĩa (nội hàm) của khái niệm như trên, cần có sự giải thích.<o:p></o:p></span></p><p class="MsoNormal" style="margin-left:.5in"><span style="font-size:13.0pt;
            line-height:107%;mso-ansi-language:EN-US">Như vậy, QTG có liên quan đến việc <i>sao
            chép tác phẩm</i>. Một tác phẩm chỉ sao chép được nếu nó đã được <i>định hình</i>
            (cố định dưới một dạng thức vật lý), như viết ra, đánh máy ra, ghi âm, và các dạng
            thức định hình khác mà có thể sao chép được. Ý tưởng chưa được định hình (thể
            hiện) thì không sao chép được, nên <i>ý tưởng thuần túy</i> không có (không được
            bảo hộ về) QTG. <br>
            <br>
            </span><i><span style="font-size:12.0pt;line-height:107%;mso-ansi-language:
            EN-US">Để trình định hình tác phẩm, tác giả phải diễn đạt ý tưởng bằng sự sáng
            tạo của mình thông qua hình tượng, ngôn ngữ, bố cục, màu sắc, hình khối, âm
            thanh, v.v.. Đây là một quá trình sáng tạo vô tận. Nguyễn Du đọc “Đoạn trường
            tân thanh”, tiếp thu ý tưởng của tác phẩm đó, có thể đã liên tưởng đến hoàn cảnh,
            cuộc đời và số phận của mình và có lẽ của dân, nước mình, và sáng tạo nên “Truyện
            Kiều” bằng tiếng Việt (Nôm), với ngôn ngữ, hình tượng, và đặc biệt thể thơ lục
            bát. “Truyện Kiều” do vậy hoàn toàn là tác phẩm của Nguyễn Du, nó phóng tác “Đoạn
            trường tân thanh” (mượn ý tưởng), nhưng diễn đạt hoàn toàn bằng các phương tiện
            và hình thức mới.</span></i><span style="font-size:13.0pt;line-height:107%;
            mso-ansi-language:EN-US"> <o:p></o:p></span></p><p class="MsoNormal" style="margin-left:.5in"><span style="font-size:13.0pt;
            line-height:107%;mso-ansi-language:EN-US">Về nguyên tắc tác phẩm được bảo hộ
            QTG <i>ngay sau khi nó được định hình</i>, không cần bất kỳ thủ tục <i>đăng ký </i>nào.
            Tuy nhiên trong một số Luật quốc gia có quy định về việc đăng ký nhằm thuận tiện
            trong sử dụng và quản lý QTG.<o:p></o:p></span></p><p class="MsoNormal" style="margin-left:.5in"><span style="font-size:13.0pt;
            line-height:107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpFirst" style="text-indent:-.25in;mso-list:l2 level1 lfo2"><!--[if !supportLists]--><span style="font-size:13.0pt;line-height:107%;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US">6)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
            </span></span><!--[endif]--><i><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Người sở hữu</span></i><span style="font-size:
            13.0pt;line-height:107%;mso-ansi-language:EN-US"> tác phẩm: <o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Tác phẩm ban đầu thuộc về người sinh ra nó (trong
            <i>phần lớn</i> trường hợp chính là <i>tác giả</i>), tức tác giả là người sở hữu
            tác phẩm. Quyền sở hữu này có thể được <i>chuyển giao</i> theo luật cho đối tượng
            khác. Người được chuyển giao QTG trở thành <i>chủ sở hữu</i> <i>quyền</i>, hay <i>người
            nắm quyền</i> (<i>rights holder)</i> tiếp theo đối với tác phẩm.<o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle"><i><span style="font-size:13.0pt;
            line-height:107%;mso-ansi-language:EN-US">Chỉ có quyền tài sản mới có thể được
            chuyển giao</span></i><span style="font-size:13.0pt;line-height:107%;
            mso-ansi-language:EN-US">. Để chuyển giao QTG, có thể dùng các hình thức: <i>nhượng
            quyền</i> hoặc <i>cấp phép (cấp giấy phép - license) sử dụng</i> <i>quyền</i>. Các
            Luật quốc gia quy định cụ thể các hình thức và quy trình chuyển giao QTG.<br>
            <br>
            Trong một số <i>bối cảnh cụ thể</i>, chủ sở hữu quyền có thể <i>“từ bỏ”</i>
            QTG: thí dụ công bố tác phẩm lên internet (cho sử dụng tự do) hoặc cho sử dụng với
            một số điều kiện (thí dụ không vì mục đích thương mại). Một trường hợp khác là <i>giấy
            phép</i> <i>Creative Commons – CC</i>, hoặc <i>giấy phép</i> <i>GPL</i> (đối với
            phần mềm nguồn mở). Các trường hợp này thường áp dụng đối với các trường hợp / dự
            án cụ thể, và <i>vẫn căn cứ trên QTG – </i>dựa trên<i> các giấy phép</i>. <o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpLast" style="text-indent:-.25in;mso-list:l2 level1 lfo2"><!--[if !supportLists]--><span style="font-size:13.0pt;line-height:107%;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US">7)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
            </span></span><!--[endif]--><i><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Bảo hộ QTG</span></i><span style="font-size:13.0pt;
            line-height:107%;mso-ansi-language:EN-US"> dịch từ thuật ngữ tiếng Anh <i>copyrights
            protect(ion)</i>. Khái niệm <i>protect</i> sẽ được dịch là “<i>bảo hộ</i>” đối
            với các QTG, và được dịch là “<i>bảo vệ</i>” đối với tác giả, người nắm quyền. &nbsp;&nbsp;&nbsp;<o:p></o:p></span></p><p class="MsoNormal" style="margin-left:.5in"><span style="font-size:13.0pt;
            line-height:107%;mso-ansi-language:EN-US">Bảo hộ gắn với việc trao cho chủ sở hữu
            (tác giả hoặc người nắm quyền) <i>quyền độc quyền</i> (<i>exclusive rights</i>)
            đối với việc khai thác tác phẩm. Tức là người nắm QTG có thể <i>tự thực hiện</i>,
            <i>cho phép hoặc cấm</i> người khác thực hiện một số quyền tác giả. <br>
            <br>
            Khai thác quyền mà không được phép của chủ sở hữu gọi là <i>hành vi vi phạm</i>
            quyền tác giả. Luật quốc gia quy định các hành vi vi phạm QTG cụ thể, cũng như
            các hình thức xử lý đối với hành vi vi phạm đó.</span><o:p></o:p></p><p class="MsoNormal" style="margin-left:.5in"><span style="font-size:13.0pt;
            line-height:107%;mso-ansi-language:EN-US">Để khai thác hợp pháp QTG phải <i>xin
            phép</i> và được sự đồng ý của chủ sở hữu quyền, và trong nhiều trường hợp phải
            <i>trả tiền đền bù</i> cho chủ sở hữu quyền, trừ một số trường hợp cụ thể được
            quy định trong Luât quốc gia về các <i>hạn chế</i> (giới hạn – <i>limitation</i>)
            và <i>ngoại lệ</i> (<i>exception</i>) đối với QTG. <o:p></o:p></span></p><p class="MsoListParagraphCxSpFirst" style="text-indent:-.25in;mso-list:l2 level1 lfo2"><!--[if !supportLists]--><span style="font-size:13.0pt;line-height:107%;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US">8)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
            </span></span><!--[endif]--><i><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Thời hạn</span></i><span style="font-size:13.0pt;
            line-height:107%;mso-ansi-language:EN-US"> <i>bảo hộ QTG</i>: Các quyền tinh thần
            thường không có thời hạn. Các quyền tài sản thường kéo dài một thời gian, thường
            là 50 năm sau cái chết của tác giả.<br>
            Các tác phẩm hết hạn bảo hộ QTG thuộc về <i>khu vực công</i> – là các tác phẩm
            công cộng, có thể khai thác và sử dụng miễn phí các quyền tài sản, nhưng phải
            tôn trọng các quyền tinh thần. <o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle" style="text-indent:-.25in;mso-list:l2 level1 lfo2"><!--[if !supportLists]--><span style="font-size:13.0pt;line-height:107%;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US">9)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
            </span></span><!--[endif]--><span style="font-size:13.0pt;line-height:107%;
            mso-ansi-language:EN-US">Nguyên tắc chung của luật pháp về bảo hộ QTG là <i>bảo
            vệ các lợi ích hợp pháp của tác giả và chủ sở hữu quyền,</i> đồng thời <i>không
            xâm hại quyền lợi hợp pháp của người dùng</i>, cũng như các <i>lợi ích xã hội
            và cộng đồng</i>.<o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Luật QTG quốc gia quy định các điều khoản cụ thể
            để đảm bảo điều hòa các lợi ích trên đây trong bối cảnh quốc gia, cũng như bối
            cảnh hội nhập quốc tế có liên quan.<o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle" style="text-indent:-.25in;mso-list:l2 level1 lfo2"><!--[if !supportLists]--><span style="font-size:13.0pt;line-height:107%;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US">10)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;"> </span></span><!--[endif]--><span style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US">&nbsp;&nbsp;Bảo hộ QTG là một sự nghiệp, một nhiệm vụ phức
            tạp và khó khăn, đặc biệt trong bối cảnh công nghệ hiện tại, có nhiều phương tiện
            và công cụ vừa hỗ trợ cho việc bảo hộ, nhưng cũng tạo thuận lợi cho việc vi phạm.
            <o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Trong phạm vi quốc gia, một hệ thống thực hành (<i>execution</i>)
            hiệu quả QTG bao gồm: luật về QTG, hệ thống thực thi <i>(enforcement)</i> xử lý
            các vi phạm, và hệ thống quản trị - trong đó có các tổ chức <i>quản trị tập thể
            quyền</i> (<i>collective rights management – CRM</i>). &nbsp;&nbsp;<o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Trong từng lĩnh vực lại có các vấn đề cụ thể
            riêng về bảo hộ QTG. Thí dụ trong các Trường đại học, và trong giáo dục đại học
            và giáo dục nói chung. các vấn đề bảo hộ QTG liên quan cả đến các tác giả, chủ
            sở hữu quyền, và người sử dụng các tác phẩm được bảo hộ QTG. Áp dụng các <i>kinh
            nghiệm thực tiễn tốt</i> (<i>best practices</i>) luôn là một chủ đề được quan
            tâm hàng đầu. <o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            </p><p class="MsoListParagraphCxSpLast"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Đây cũng là một lĩnh vực ứng dụng quan trọng các
            công cụ Tin học, từ phát triển các thuật toán và phần mềm giải quyết các bài
            toán cụ thể, đến xây dựng các CSDL và HTTT chuyên về QTG và bảo hộ QTG.<o:p></o:p></span></p>'
        ],
        [
            'title' => 'Một số quy định về QTG ở Việt Nam',
            'user_id' => 1,
            'created_at' => now(),
            'content' =>
            '<p class="MsoNormal"><span lang="EN-US" style="font-size:13.0pt;line-height:107%;
            mso-ansi-language:EN-US">Các điều khoản về QTG ở Việt Nam được quy định tại Phần
            2 Luật SHTT Việt Nam (Luật s</span><span lang="VI" style="font-size:13.0pt;
            line-height:107%">ố: 50/2005/QH11</span><span lang="EN-US" style="font-size:13.0pt;
            line-height:107%;mso-ansi-language:EN-US">, sửa đổi 2009), và được hướng dẫn thực
            hiện trong Nghị định </span><span lang="VI" style="font-size:12.0pt;line-height:
            107%;mso-ascii-font-family:&quot;Times New Roman&quot;;mso-ascii-theme-font:major-latin;
            mso-fareast-font-family:&quot;Times New Roman&quot;;mso-hansi-font-family:&quot;Times New Roman&quot;;
            mso-hansi-theme-font:major-latin;mso-bidi-font-family:&quot;Times New Roman&quot;;
            mso-bidi-theme-font:major-latin;color:black">Số: 22/2018/NĐ-CP</span><span lang="VI" style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US"> </span><span lang="EN-US" style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US">của
            Chính phủ.<o:p></o:p></span></p><p class="MsoNormal"><span lang="EN-US" style="font-size:13.0pt;line-height:107%;
            mso-ansi-language:EN-US">Các nội dung nêu trong phần 1 được quy định chi tiết
            như sau:<o:p></o:p></span></p><p class="MsoNormal"><span lang="EN-US" style="font-size:13.0pt;line-height:107%;
            mso-ansi-language:EN-US">&nbsp;<o:p></o:p></span></p><p>
            </p><table class="MsoTableGrid" border="1" cellspacing="0" cellpadding="0" style="border: none;">
             <tbody><tr>
              <td width="113" valign="top" style="width:84.8pt;border:solid windowtext 1.0pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
              text-align:center;line-height:normal"><i><span lang="EN-US" style="font-size:
              13.0pt;mso-ansi-language:EN-US">Đối tượng / khái niệm<o:p></o:p></span></i></p>
              </td>
              <td width="387" valign="top" style="width:290.6pt;border:solid windowtext 1.0pt;
              border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
              solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
              text-align:center;line-height:normal"><i><span lang="EN-US" style="font-size:
              13.0pt;mso-ansi-language:EN-US">Quy định / điều khoản<o:p></o:p></span></i></p>
              </td>
              <td width="101" valign="top" style="width:75.4pt;border:solid windowtext 1.0pt;
              border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
              solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
              text-align:center;line-height:normal"><i><span lang="EN-US" style="font-size:
              13.0pt;mso-ansi-language:EN-US">Ghi chú<o:p></o:p></span></i></p>
              </td>
             </tr>
             <tr>
              <td width="113" valign="top" style="width:84.8pt;border:solid windowtext 1.0pt;
              border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
              padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">Quyền
              SHTT, QTG<o:p></o:p></span></p>
              </td>
              <td width="387" valign="top" style="width:290.6pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">1. <i>Quyền sở hữu trí tuệ</i> là quyền của tổ chức, cá nhân đối
              với tài sản trí tuệ, bao gồm quyền tác giả và quyền liên quan đến quyền tác
              giả, quyền sở hữu công nghiệp và quyền đối với giống cây trồng.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">2. <i>Quyền tác giả</i> là quyền của tổ chức, cá nhân đối với tác
              phẩm do mình sáng tạo ra hoặc sở hữu.<o:p></o:p></span></p>
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">&nbsp;</span></p>
              </td>
              <td width="101" valign="top" style="width:75.4pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">&nbsp;</span></p>
              </td>
             </tr>
             <tr>
              <td width="113" valign="top" style="width:84.8pt;border:solid windowtext 1.0pt;
              border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
              padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="VI" style="font-size:13.0pt">Tác phẩm được bảo hộ QTG<o:p></o:p></span></p>
              </td>
              <td width="387" valign="top" style="width:290.6pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><b><span lang="VI">Điều 14. <i>Các loại hình tác phẩm được
              bảo hộ quyền tác giả</i></span></b><span lang="VI"><o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">1. Tác phẩm văn học, nghệ thuật và khoa
              học được bảo hộ bao gồm:<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">a) Tác phẩm văn học, khoa học, sách giáo
              khoa, giáo trình và tác phẩm khác được thể hiện dưới dạng chữ viết hoặc ký tự
              khác;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">b) Bài giảng, bài phát biểu và bài nói
              khác;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">c) Tác phẩm báo chí;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">d) Tác phẩm âm nhạc;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">đ) Tác phẩm sân khấu;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">e) Tác phẩm điện ảnh và tác phẩm được
              tạo ra theo phương pháp tương tự (sau đây gọi chung là tác phẩm điện ảnh);<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">g) Tác phẩm tạo hình, mỹ thuật ứng dụng;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">h) Tác phẩm nhiếp ảnh;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">i) Tác phẩm kiến trúc;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">k) Bản họa đồ, sơ đồ, bản đồ, bản vẽ liên quan đến địa hình, công
              trình khoa học;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">l) Tác phẩm văn học, nghệ thuật dân gian;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">m) Chương trình máy tính, sưu tập dữ liệu.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">2. Tác phẩm phái sinh chỉ được bảo hộ theo quy định tại khoản 1
              Điều này nếu không gây phương hại đến quyền tác giả đối với tác phẩm được
              dùng để làm tác phẩm phái sinh.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">3. Tác phẩm được bảo hộ quy định tại khoản 1 và khoản 2 Điều này
              phải do tác giả trực tiếp sáng tạo bằng lao động trí tuệ của mình mà không
              sao chép từ tác phẩm của người khác.<i><o:p></o:p></i></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">4. Chính phủ hướng dẫn cụ thể về các loại hình tác phẩm quy định
              tại khoản 1 Điều này.<o:p></o:p></span></p>
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">&nbsp;</span></p>
              </td>
              <td width="101" valign="top" style="width:75.4pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">Bài
              giảng và các tác phẩm nói trong b) là các tác phẩm thể hiện bằng <i>lời nói;</i><o:p></o:p></span></p>
              </td>
             </tr>
             <tr>
              <td width="113" valign="top" style="width:84.8pt;border:solid windowtext 1.0pt;
              border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
              padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="VI" style="font-size:13.0pt">Tác phẩm không được bảo hộ QTG<o:p></o:p></span></p>
              </td>
              <td width="387" valign="top" style="width:290.6pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><b><span lang="VI">Điều 15. <i>Các đối tượng không thuộc
              phạm vi bảo hộ quyền tác giả</i></span></b><span lang="VI"><o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">1. Tin tức thời sự thuần tuý đưa tin. <o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">2. Văn bản quy phạm pháp luật, văn bản
              hành chính, văn bản khác thuộc lĩnh vực tư pháp và bản dịch chính thức của
              văn bản đó.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">3. Quy trình, hệ thống, phương pháp hoạt
              động, khái niệm, nguyên lý, số liệu. <o:p></o:p></span></p>
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="VI" style="font-size:13.0pt">&nbsp;</span></p>
              </td>
              <td width="101" valign="top" style="width:75.4pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="VI" style="font-size:13.0pt">&nbsp;</span></p>
              </td>
             </tr>
             <tr>
              <td width="113" valign="top" style="width:84.8pt;border:solid windowtext 1.0pt;
              border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
              padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">QTG
              <o:p></o:p></span></p>
              </td>
              <td width="387" valign="top" style="width:290.6pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><b><span lang="EN-US">Điều 18. <i>Quyền tác giả</i></span></b><span lang="EN-US"><o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">Quyền tác giả đối với tác phẩm quy định tại Luật này bao gồm quyền
              nhân thân và quyền tài sản.<o:p></o:p></span></p>
              <a name="20"></a><a name="21"></a>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">&nbsp;</span></p>
              </td>
              <td width="101" valign="top" style="width:75.4pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">Cách
              gọi khác là quyền đạo đức (moral) và quyền kinh tế (economic)<o:p></o:p></span></p>
              </td>
             </tr>
             <tr>
              <td width="113" valign="top" style="width:84.8pt;border:solid windowtext 1.0pt;
              border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
              padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">Quyền
              nhân thân<o:p></o:p></span></p>
              </td>
              <td width="387" valign="top" style="width:290.6pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><b><span lang="EN-US">Điều 19. <i>Quyền nhân thân</i></span></b><span lang="EN-US"><o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">Quyền nhân thân bao gồm các quyền sau đây:<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">1. Đặt tên cho tác phẩm;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">2. Đứng tên thật hoặc bút danh trên tác phẩm; được nêu tên thật
              hoặc bút danh khi tác phẩm được công bố, sử dụng;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">3. Công bố tác phẩm hoặc cho phép người khác công bố tác phẩm;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">4. Bảo vệ sự toàn vẹn của tác phẩm, không cho người khác sửa chữa,
              cắt xén hoặc xuyên tạc tác phẩm dưới bất kỳ hình thức nào gây phương hại đến
              danh dự và uy tín của tác giả.<o:p></o:p></span></p>
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:12.0pt;mso-ansi-language:EN-US">&nbsp;</span></p>
              </td>
              <td width="101" valign="top" style="width:75.4pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">&nbsp;Trong nhiều Luật QTG, điểm 3 (quyền công bố
              tác phẩm) thuộc quyền tài sản, &nbsp;không
              thuộc Quyền nhân thân.<o:p></o:p></span></p>
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">&nbsp;</span></p>
              </td>
             </tr>
             <tr>
              <td width="113" valign="top" style="width:84.8pt;border:solid windowtext 1.0pt;
              border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
              padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">Quyền
              tài sản<o:p></o:p></span></p>
              </td>
              <td width="387" valign="top" style="width:290.6pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><b><span lang="EN-US">Điều 20. <i>Quyền tài sản</i></span></b><span lang="EN-US"><o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">1. Quyền tài sản bao gồm các quyền sau đây: <o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">a) Làm tác phẩm phái sinh;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">b) Biểu diễn tác phẩm trước công chúng;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">c) Sao chép tác phẩm;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">d) Phân phối, nhập khẩu bản gốc hoặc bản sao tác phẩm;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">đ) Truyền đạt tác phẩm đến công chúng bằng phương tiện hữu tuyến,
              vô tuyến, mạng thông tin điện tử hoặc bất kỳ phương tiện kỹ thuật nào khác;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">e) Cho thuê bản gốc hoặc bản sao tác phẩm điện ảnh, chương trình
              máy tính.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">2. Các quyền quy định tại khoản 1 Điều này do tác giả, chủ sở hữu
              quyền tác giả độc quyền thực hiện hoặc cho phép người khác thực hiện theo quy
              định của Luật này.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">3. Tổ chức, cá nhân khi khai thác, sử dụng một, một số hoặc toàn
              bộ các quyền quy định tại khoản 1</span><span lang="EN-US" style="font-size:
              13.0pt"> </span><span lang="EN-US">Điều này và khoản 3 Điều 19 của Luật này
              phải xin phép và trả tiền nhuận bút, thù lao, các quyền lợi vật chất khác cho
              chủ sở hữu quyền tác giả. <o:p></o:p></span></p>
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">&nbsp;</span></p>
              </td>
              <td width="101" valign="top" style="width:75.4pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">Tác
              phẩm phái sinh: dịch sang ngôn ngữ khác, chuyển thể,<o:p></o:p></span></p>
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">cải
              biên, v.v.<o:p></o:p></span></p>
              </td>
             </tr>
             <tr>
              <td width="113" valign="top" style="width:84.8pt;border:solid windowtext 1.0pt;
              border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
              padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">Xác
              lập QTG<o:p></o:p></span></p>
              </td>
              <td width="387" valign="top" style="width:290.6pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><b><span lang="EN-US">Điều 6. <i>Căn cứ phát sinh, xác lập quyền sở hữu trí tuệ</i></span></b><span lang="EN-US"><o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">1. Quyền tác giả phát sinh kể từ khi tác phẩm được sáng tạo và
              được thể hiện dưới một hình thức vật chất nhất định, không phân biệt nội
              dung, chất lượng, hình thức, phương tiện, ngôn ngữ, đã công bố hay chưa công
              bố, đã đăng ký hay chưa đăng ký. <o:p></o:p></span></p>
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">&nbsp;</span></p>
              </td>
              <td width="101" valign="top" style="width:75.4pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">&nbsp;</span></p>
              </td>
             </tr>
             <tr>
              <td width="113" valign="top" style="width:84.8pt;border:solid windowtext 1.0pt;
              border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
              padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="VI" style="font-size:13.0pt">Giới hạn và Ngoại lệ QTG 1:<br>
              <br>
              Không phải xin phép, không phải trả tiền thù lao<o:p></o:p></span></p>
              </td>
              <td width="387" valign="top" style="width:290.6pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><b><span lang="VI">Điều 25. <i>Các trường hợp sử dụng tác
              phẩm đã công bố không phải xin phép, không phải trả tiền nhuận bút, thù lao </i></span></b><span lang="VI"><o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">1. Các trường hợp sử dụng tác phẩm đã
              công bố không phải xin phép, không phải trả tiền nhuận bút, thù lao bao gồm:<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">a) Tự sao chép một bản nhằm mục đích
              nghiên cứu khoa học, giảng dạy của cá nhân;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">b) Trích dẫn hợp lý tác phẩm mà không
              làm sai ý tác giả để bình luận hoặc minh họa trong tác phẩm của mình;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">c) Trích dẫn tác phẩm mà không làm sai ý
              tác giả để viết báo, dùng trong ấn phẩm định kỳ, trong chương trình phát
              thanh, truyền hình, phim tài liệu;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">d) Trích dẫn tác phẩm để giảng dạy trong
              nhà trường mà không làm sai ý tác giả, không nhằm mục đích thương mại;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">đ) Sao chép tác phẩm để lưu trữ trong
              thư viện với mục đích nghiên cứu;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">e) Biểu diễn tác phẩm sân khấu, loại
              hình biểu diễn nghệ thuật khác trong các buổi sinh hoạt văn hoá, tuyên truyền
              cổ động không thu tiền dưới bất kỳ hình thức nào; <o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">g) Ghi âm, ghi hình trực tiếp buổi biểu
              diễn để đưa tin thời sự hoặc để giảng dạy;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">h) Chụp ảnh, truyền hình tác phẩm tạo
              hình, kiến trúc, nhiếp ảnh, mỹ thuật ứng dụng được trưng bày tại nơi công
              cộng nhằm giới thiệu hình ảnh của tác phẩm đó;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">i) Chuyển tác phẩm sang chữ nổi hoặc
              ngôn ngữ khác cho người khiếm thị;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">k) Nhập khẩu bản sao tác phẩm của người
              khác để sử dụng riêng. <o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">2. Tổ chức, cá nhân sử dụng tác phẩm quy
              định tại khoản 1 Điều này không được làm ảnh hưởng đến việc khai thác bình
              thường tác phẩm, không gây phương hại đến các quyền của tác giả, chủ sở hữu
              quyền tác giả; phải thông tin về tên tác giả và nguồn gốc, xuất xứ của tác
              phẩm.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">3. Việc sử dụng tác phẩm trong các
              trường hợp quy định tại khoản 1 Điều này không áp dụng đối với tác phẩm kiến
              trúc, tác phẩm tạo hình, chương trình máy tính.<o:p></o:p></span></p>
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="VI" style="font-size:12.0pt">&nbsp;</span></p>
              </td>
              <td width="101" valign="top" style="width:75.4pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="VI" style="font-size:13.0pt">&nbsp;</span></p>
              </td>
             </tr>
             <tr>
              <td width="113" valign="top" style="width:84.8pt;border:solid windowtext 1.0pt;
              border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
              padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="VI" style="font-size:13.0pt">Giới hạn và Ngoại lệ QTG 2:<br>
              <br>
              Không phải xin phép, phải trả tiền thù lao<o:p></o:p></span></p>
              </td>
              <td width="387" valign="top" style="width:290.6pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><b><span lang="VI">Điều 26. <i>Các trường hợp sử dụng tác
              phẩm đã công bố không phải xin phép nhưng phải trả tiền nhuận bút, thù lao</i></span></b><span lang="VI"><o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">1. Tổ chức phát sóng sử dụng tác phẩm đã
              công bố để thực hiện chương trình phát sóng có tài trợ, quảng cáo hoặc thu
              tiền dưới bất kỳ hình thức nào không phải xin phép nhưng phải trả tiền nhuận
              bút, thù lao cho chủ sở hữu quyền tác giả theo quy định của Chính phủ.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">2. Tổ chức, cá nhân sử dụng tác phẩm quy
              định tại khoản 1 Điều này không được làm ảnh hưởng đến việc khai thác bình
              thường tác phẩm, không gây phương hại đến các quyền của tác giả, chủ sở hữu
              quyền tác giả; phải thông tin về tên tác giả và nguồn gốc, xuất xứ của tác
              phẩm.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">3. Việc sử dụng tác phẩm trong các
              trường hợp quy định tại khoản 1 Điều này không áp dụng đối với tác phẩm điện
              ảnh. <o:p></o:p></span></p>
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="VI" style="font-size:12.0pt">&nbsp;</span></p>
              </td>
              <td width="101" valign="top" style="width:75.4pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="VI" style="font-size:13.0pt">Tương đương với “<i>cấp phép bắt
              buộc</i>” trong Luật QT và một số Luật QG<o:p></o:p></span></p>
              </td>
             </tr>
             <tr>
              <td width="113" valign="top" style="width:84.8pt;border:solid windowtext 1.0pt;
              border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
              padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">Tác
              phẩm dân gian<o:p></o:p></span></p>
              </td>
              <td width="387" valign="top" style="width:290.6pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><b><span lang="EN-US">Điều 23. <i>Quyền tác giả đối với tác phẩm văn học, nghệ thuật dân
              gian</i></span></b><span lang="EN-US"><o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">1. Tác phẩm văn học, nghệ thuật dân gian là sáng tạo tập thể trên
              nền tảng truyền thống của một nhóm hoặc các cá nhân nhằm phản ánh khát vọng
              của cộng đồng, thể hiện tương xứng đặc điểm văn hoá và xã hội của họ, các
              tiêu chuẩn và giá trị được lưu truyền bằng cách mô phỏng hoặc bằng cách khác.
              Tác phẩm văn học, nghệ thuật dân gian bao gồm:<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">a) Truyện, thơ, câu đố;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">b) Điệu hát, làn điệu âm nhạc;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">c) Điệu múa, vở diễn, nghi lễ và các trò chơi;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">d) Sản phẩm nghệ thuật đồ hoạ, hội hoạ, điêu khắc, nhạc cụ, hình
              mẫu kiến trúc và các loại hình nghệ thuật khác được thể hiện dưới bất kỳ hình
              thức vật chất nào.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">2. Tổ chức, cá nhân khi sử dụng tác phẩm văn học, nghệ thuật dân
              gian phải dẫn chiếu xuất sứ của loại hình tác phẩm đó và bảo đảm giữ gìn giá
              trị đích thực của tác phẩm văn học, nghệ thuật dân gian.<o:p></o:p></span></p>
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:12.0pt;mso-ansi-language:EN-US">&nbsp;</span></p>
              </td>
              <td width="101" valign="top" style="width:75.4pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">&nbsp;</span></p>
              </td>
             </tr>
             <tr>
              <td width="113" valign="top" style="width:84.8pt;border:solid windowtext 1.0pt;
              border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
              padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="VI" style="font-size:13.0pt">Thời hạn bảo hộ QTG<o:p></o:p></span></p>
              </td>
              <td width="387" valign="top" style="width:290.6pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><b><span lang="VI">Điều 27. <i>Thời hạn bảo hộ quyền tác
              giả</i></span></b><span lang="VI"><o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">1. Quyền nhân thân quy định tại các
              khoản 1, 2 và 4 Điều 19 của Luật này được bảo hộ vô thời hạn.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">2. Quyền nhân thân quy định tại khoản 3
              Điều 19 và quyền tài sản quy định tại Điều 20 của Luật này có thời hạn bảo hộ
              như sau:<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">a) Tác phẩm điện ảnh, nhiếp ảnh, sân
              khấu, mỹ thuật ứng dụng, tác phẩm khuyết danh có thời hạn bảo hộ là năm mươi
              năm, kể từ khi tác phẩm được công bố lần đầu tiên. Trong thời hạn năm mươi
              năm, kể từ khi tác phẩm điện ảnh, tác phẩm sân khấu được định hình, nếu tác
              phẩm chưa được công bố thì thời hạn được tính từ khi tác phẩm được định hình;
              đối với tác phẩm khuyết danh, khi các thông tin về tác giả được xuất hiện thì
              thời hạn bảo hộ được tính theo quy định tại điểm b khoản này;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">b) Tác phẩm không thuộc loại hình quy
              định tại điểm a khoản này có thời hạn bảo hộ là suốt cuộc đời tác giả và năm
              mươi năm tiếp theo năm tác giả chết; trong trường hợp tác phẩm có đồng tác
              giả thì thời hạn bảo hộ chấm dứt vào năm thứ năm mươi sau năm đồng tác giả
              cuối cùng chết;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="VI">c) Thời hạn bảo hộ quy định tại điểm a
              và điểm b khoản này chấm dứt vào thời điểm 24 giờ ngày 31 tháng 12 của năm
              chấm dứt thời hạn bảo hộ quyền tác giả.<o:p></o:p></span></p>
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="VI" style="font-size:12.0pt">&nbsp;</span></p>
              </td>
              <td width="101" valign="top" style="width:75.4pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="VI" style="font-size:13.0pt">&nbsp;</span></p>
              </td>
             </tr>
             <tr>
              <td width="113" valign="top" style="width:84.8pt;border:solid windowtext 1.0pt;
              border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
              padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">Vi
              phạm QTG<o:p></o:p></span></p>
              </td>
              <td width="387" valign="top" style="width:290.6pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><b><span lang="EN-US">Điều 28. <i>Hành vi xâm phạm quyền tác giả</i></span></b><span lang="EN-US"><o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">1. Chiếm đoạt quyền tác giả đối với tác phẩm văn học, nghệ thuật,
              khoa học.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">2. Mạo danh tác giả.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">3. Công bố, phân phối tác phẩm mà không được phép của tác giả.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">4. Công bố, phân phối tác phẩm có đồng tác giả mà không được phép
              của đồng tác giả đó. <o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">5. Sửa chữa, cắt xén hoặc xuyên tạc tác phẩm dưới bất kỳ hình thức
              nào gây phương hại đến danh dự và uy tín của tác giả.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">6. Sao chép tác phẩm mà không được phép của tác giả, chủ sở hữu
              quyền tác giả, trừ trường hợp quy định tại điểm a và điểm đ khoản 1 Điều 25
              của Luật này.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">7. Làm tác phẩm phái sinh mà không được phép của tác giả, chủ sở
              hữu quyền tác giả đối với tác phẩm được dùng để làm tác phẩm phái sinh, trừ
              trường hợp quy định tại điểm i khoản 1 Điều 25 của Luật này.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">8. Sử dụng tác phẩm mà không được phép của chủ sở hữu quyền tác
              giả, không trả tiền nhuận bút, thù lao, quyền lợi vật chất khác theo quy định
              của pháp luật, trừ trường hợp quy định tại khoản 1 Điều 25 của Luật này.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">9. Cho thuê tác phẩm mà không trả tiền nhuận bút, thù lao và quyền
              lợi vật chất khác cho tác giả hoặc chủ sở hữu quyền tác giả.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">10. Nhân bản, sản xuất bản sao, phân phối, trưng bày hoặc truyền
              đạt tác phẩm đến công chúng qua mạng truyền thông và các phương tiện kỹ thuật
              số mà không được phép của chủ sở hữu quyền tác giả. <o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">11. Xuất bản tác phẩm mà không được phép của chủ sở hữu quyền tác
              giả.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">12. Cố ý huỷ bỏ hoặc làm vô hiệu các biện pháp kỹ thuật do chủ sở
              hữu quyền tác giả thực hiện để bảo vệ quyền tác giả đối với tác phẩm của
              mình.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">13. Cố ý xoá, thay đổi thông tin quản lý quyền dưới hình thức điện
              tử có trong tác phẩm.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">14. Sản xuất, lắp ráp, biến đổi, phân phối, nhập khẩu, xuất khẩu,
              bán hoặc cho thuê thiết bị khi biết hoặc có cơ sở để biết thiết bị đó làm vô
              hiệu các biện pháp kỹ thuật do chủ sở hữu quyền tác giả thực hiện để bảo vệ
              quyền tác giả đối với tác phẩm của mình.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">15. Làm và bán tác phẩm mà chữ ký của tác giả bị giả mạo.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">16. Xuất khẩu, nhập khẩu, phân phối bản sao tác phẩm mà không được
              phép của chủ sở hữu quyền tác giả.<o:p></o:p></span></p>
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:12.0pt;mso-ansi-language:EN-US">&nbsp;</span></p>
              </td>
              <td width="101" valign="top" style="width:75.4pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">Các
              điểm&nbsp; 12, 13, 15 đáp ứng Hiệp ước
              Internet WTC mà Việt Nam vừa mới tham gia 2-2022.<o:p></o:p></span></p>
              </td>
             </tr>
             <tr>
              <td width="113" valign="top" style="width:84.8pt;border:solid windowtext 1.0pt;
              border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
              padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">Chủ
              sở hữu QTG<o:p></o:p></span></p>
              </td>
              <td width="387" valign="top" style="width:290.6pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><b><span lang="EN-US">Điều 36. <i>Chủ sở hữu quyền tác giả </i></span></b><span lang="EN-US"><o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">Chủ sở hữu quyền tác giả là tổ chức, cá nhân nắm giữ một, một số
              hoặc toàn bộ các quyền tài sản quy định tại Điều 20 của Luật này.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><a name="38"></a><b><span lang="EN-US">Điều 37. <i>Chủ sở hữu quyền tác giả là tác
              giả</i></span></b><span lang="EN-US"><o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">Tác giả sử dụng thời gian, tài chính, cơ sở vật chất - kỹ thuật
              của mình để sáng tạo ra tác phẩm có các quyền nhân thân quy định tại Điều 19
              và các quyền tài sản quy định tại Điều 20 của Luật này.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><a name="39"></a><b><span lang="EN-US">Điều 38. <i>Chủ sở hữu quyền tác giả là các
              đồng tác giả</i></span></b><span lang="EN-US"><o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">1. Các đồng tác giả sử dụng thời gian, tài chính, cơ sở vật chất -
              kỹ thuật của mình để cùng sáng tạo ra tác phẩm có chung các quyền quy định
              tại Điều 19 và Điều 20 của Luật này đối với tác phẩm đó.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">2. Các đồng tác giả sáng tạo ra tác phẩm quy định tại khoản 1 Điều
              này, nếu có phần riêng biệt có thể tách ra sử dụng độc lập mà không làm
              phương hại đến phần của các đồng tác giả khác thì có các quyền quy định tại
              Điều 19 và Điều 20 của Luật này đối với phần riêng biệt đó.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><a name="40"></a><b><span lang="EN-US">Điều 39. <i>Chủ sở hữu quyền tác giả là tổ
              chức, cá nhân giao nhiệm vụ cho tác giả hoặc giao kết hợp đồng với tác giả</i></span></b><span lang="EN-US"><o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">1. Tổ chức giao nhiệm vụ sáng tạo tác phẩm cho tác giả là người
              thuộc tổ chức mình là chủ sở hữu các quyền quy định tại Điều 20 và khoản 3
              Điều 19 của Luật này, trừ trường hợp có thoả thuận khác.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">2. Tổ chức, cá nhân giao kết hợp đồng với tác giả sáng tạo ra tác
              phẩm là chủ sở hữu các quyền quy định tại Điều 20 và khoản 3 Điều 19 của Luật
              này, trừ trường hợp có thoả thuận khác.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><a name="41"></a><b><span lang="EN-US">Điều 40. <i>Chủ sở hữu quyền tác giả là người
              thừa kế</i></span></b><span lang="EN-US"><o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">Tổ chức, cá nhân được thừa kế quyền tác giả theo quy định của pháp
              luật về thừa kế là chủ sở hữu các quyền quy định tại Điều 20 và khoản 3 Điều
              19 của Luật này.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><a name="42"></a><b><span lang="EN-US">Điều 41. <i>Chủ sở hữu quyền tác giả là người
              được chuyển giao quyền</i></span></b><span lang="EN-US"><o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">Tổ chức, cá nhân được chuyển giao một, một số hoặc toàn bộ các
              quyền quy định tại Điều 20 và khoản 3 Điều 19 của Luật này theo thoả thuận
              trong hợp đồng là chủ sở hữu quyền tác giả.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><a name="43"></a><b><span lang="EN-US">Điều 42. <i>Chủ sở hữu quyền tác giả là Nhà
              nước </i></span></b><span lang="EN-US"><o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">1. Nhà nước là chủ sở hữu quyền tác giả đối với các tác phẩm sau
              đây:<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">a) Tác phẩm khuyết danh;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">b) Tác phẩm còn trong thời hạn bảo hộ mà chủ sở hữu quyền tác giả
              chết không có người thừa kế, người thừa kế từ chối nhận di sản hoặc không
              được quyền hưởng di sản;<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">c) Tác phẩm được chủ sở hữu quyền tác giả chuyển giao quyền sở hữu
              cho Nhà nước.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">2. Chính phủ quy định cụ thể việc sử dụng tác phẩm thuộc sở hữu
              nhà nước.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><a name="44"></a><b><span lang="EN-US">Điều 43. <i>Tác phẩm thuộc về công chúng</i></span></b><span lang="EN-US"><o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">1. Tác phẩm đã kết thúc thời hạn bảo hộ theo quy định tại Điều 27
              của Luật này thì thuộc về công chúng.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">2. Mọi tổ chức, cá nhân đều có quyền sử dụng tác phẩm quy định tại
              khoản 1 Điều này nhưng phải tôn trọng các quyền nhân thân của tác giả quy
              định tại Điều 19 của Luật này.<o:p></o:p></span></p>
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="VI" style="font-size:12.0pt">3. Chính phủ quy định cụ thể
              việc sử dụng tác phẩm thuộc về công chúng.</span><span lang="EN-US" style="font-size:12.0pt;mso-ansi-language:EN-US"><o:p></o:p></span></p>
              </td>
              <td width="101" valign="top" style="width:75.4pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">&nbsp;</span></p>
              </td>
             </tr>
             <tr>
              <td width="113" valign="top" style="width:84.8pt;border:solid windowtext 1.0pt;
              border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
              padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">Chuyển
              nhượng QTG<o:p></o:p></span></p>
              </td>
              <td width="387" valign="top" style="width:290.6pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><b><span lang="EN-US">Điều 45. <i>Quy định chung về chuyển nhượng quyền tác giả, quyền
              liên quan</i></span></b><span lang="EN-US"><o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">1. Chuyển nhượng quyền tác giả, quyền liên quan là việc chủ sở hữu
              quyền tác giả, chủ sở hữu quyền liên quan chuyển giao quyền sở hữu đối với
              các quyền quy định tại khoản 3 Điều 19, Điều 20, khoản 3 Điều 29, Điều 30 và
              Điều 31 của Luật này cho tổ chức, cá nhân khác theo hợp đồng hoặc theo quy
              định của pháp luật có liên quan.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">2. Tác giả không được chuyển nhượng các quyền nhân thân quy định
              tại Điều 19, trừ quyền công bố tác phẩm; người biểu diễn không được chuyển
              nhượng các quyền nhân thân quy định tại khoản 2 Điều 29 của Luật này.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">3. Trong trường hợp tác phẩm, cuộc biểu diễn, bản ghi âm, ghi
              hình, chương trình phát sóng có đồng chủ sở hữu thì việc chuyển nhượng phải
              có sự thoả thuận của tất cả các đồng chủ sở hữu; trong trường hợp có đồng chủ
              sở hữu nhưng tác phẩm, cuộc biểu diễn, bản ghi âm, ghi hình, chương trình
              phát sóng có các phần riêng biệt có thể tách ra sử dụng độc lập thì chủ sở
              hữu quyền tác giả, chủ sở hữu quyền liên quan có quyền chuyển nhượng quyền
              tác giả, quyền liên quan đối với phần riêng biệt của mình cho tổ chức, cá
              nhân khác.<o:p></o:p></span></p>
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:12.0pt;mso-ansi-language:EN-US">&nbsp;</span></p>
              </td>
              <td width="101" valign="top" style="width:75.4pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">&nbsp;</span></p>
              </td>
             </tr>
             <tr>
              <td width="113" valign="top" style="width:84.8pt;border:solid windowtext 1.0pt;
              border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
              padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">Cấp
              phép QTG<o:p></o:p></span></p>
              </td>
              <td width="387" valign="top" style="width:290.6pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><b><span lang="EN-US">Điều 47. <i>Quy định chung về chuyển quyền sử dụng quyền tác giả,
              quyền liên quan</i></span></b><span lang="EN-US"><o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">1. Chuyển quyền sử dụng quyền tác giả, quyền liên quan là việc chủ
              sở hữu quyền tác giả, chủ sở hữu quyền liên quan cho phép tổ chức, cá nhân
              khác sử dụng có thời hạn một, một số hoặc toàn bộ các quyền quy định tại
              khoản 3 Điều 19, Điều 20, khoản 3 Điều 29, Điều 30 và Điều 31 của Luật này.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">2. Tác giả không được chuyển quyền sử dụng các quyền nhân thân quy
              định tại Điều 19, trừ quyền công bố tác phẩm; người biểu diễn không được
              chuyển quyền sử dụng các quyền nhân thân quy định tại khoản 2 Điều 29 của
              Luật này.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">3. Trong trường hợp tác phẩm, cuộc biểu diễn, bản ghi âm, ghi
              hình, chương trình phát sóng có đồng chủ sở hữu thì việc chuyển quyền sử dụng
              quyền tác giả, quyền liên quan phải có sự thoả thuận của tất cả các đồng chủ sở
              hữu; trong trường hợp có đồng chủ sở hữu nhưng tác phẩm, cuộc biểu diễn, bản
              ghi âm, ghi hình, chương trình phát sóng có các phần riêng biệt có thể tách
              ra sử dụng độc lập thì chủ sở hữu quyền tác giả, chủ sở hữu quyền liên quan
              có thể chuyển quyền sử dụng quyền tác giả, quyền liên quan đối với phần riêng
              biệt của mình cho tổ chức, cá nhân khác.<o:p></o:p></span></p>
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="VI" style="font-size:12.0pt">4. Tổ chức, cá nhân được chuyển
              quyền sử dụng quyền tác giả, quyền liên quan có thể chuyển quyền sử dụng cho
              tổ chức, cá nhân khác nếu được sự đồng ý của chủ sở hữu quyền tác giả, chủ sở
              hữu quyền liên quan.</span><span lang="EN-US" style="font-size:12.0pt;
              mso-ansi-language:EN-US"><o:p></o:p></span></p>
              </td>
              <td width="101" valign="top" style="width:75.4pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">Chuyển
              quyền sử dụng trong Luật VN tương đương với Cấp phép (license) trong Luật QT
              và nhiều Luật QG.<o:p></o:p></span></p>
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">&nbsp;</span></p>
              </td>
             </tr>
             <tr>
              <td width="113" valign="top" style="width:84.8pt;border:solid windowtext 1.0pt;
              border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
              padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">Đăng
              ký QTG<o:p></o:p></span></p>
              </td>
              <td width="387" valign="top" style="width:290.6pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><b><span lang="EN-US">Điều 49. <i>Đăng ký quyền tác giả, quyền liên quan</i></span></b><span lang="EN-US"><o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">1. Đăng ký quyền tác giả, quyền liên quan là việc tác giả, chủ sở
              hữu quyền tác giả, chủ sở hữu quyền liên quan nộp đơn và hồ sơ kèm theo (sau
              đây gọi chung là đơn) cho cơ quan nhà nước có thẩm quyền để ghi nhận các
              thông tin về tác giả, tác phẩm, chủ sở hữu quyền tác giả, chủ sở hữu quyền
              liên quan. <o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">2. Việc nộp đơn để được cấp Giấy chứng nhận đăng ký quyền tác giả,
              Giấy chứng nhận đăng ký quyền liên quan không phải là thủ tục bắt buộc để
              được hưởng quyền tác giả, quyền liên quan theo quy định của Luật này.<o:p></o:p></span></p>
              <p style="margin-top:.2in;margin-right:0in;margin-bottom:.2in;margin-left:
              0in;mso-para-margin-top:1.2gd;mso-para-margin-right:0in;mso-para-margin-bottom:
              1.2gd;mso-para-margin-left:0in;text-align:justify;text-indent:.5in"><span lang="EN-US">3. Tổ chức, cá nhân đã được cấp Giấy chứng nhận đăng ký quyền tác
              giả, Giấy chứng nhận đăng ký quyền liên quan không có nghĩa vụ chứng minh
              quyền tác giả, quyền liên quan thuộc về mình khi có tranh chấp, trừ trường
              hợp có chứng cứ ngược lại.<o:p></o:p></span></p>
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:12.0pt;mso-ansi-language:EN-US">&nbsp;</span></p>
              </td>
              <td width="101" valign="top" style="width:75.4pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">&nbsp;</span></p>
              </td>
             </tr>
             <tr>
              <td width="113" valign="top" style="width:84.8pt;border:solid windowtext 1.0pt;
              border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
              padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">&nbsp;</span></p>
              </td>
              <td width="387" valign="top" style="width:290.6pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">&nbsp;</span></p>
              </td>
              <td width="101" valign="top" style="width:75.4pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">&nbsp;</span></p>
              </td>
             </tr>
             <tr>
              <td width="113" valign="top" style="width:84.8pt;border:solid windowtext 1.0pt;
              border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
              padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">&nbsp;</span></p>
              </td>
              <td width="387" valign="top" style="width:290.6pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">&nbsp;</span></p>
              </td>
              <td width="101" valign="top" style="width:75.4pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
              <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal"><span lang="EN-US" style="font-size:13.0pt;mso-ansi-language:EN-US">&nbsp;</span></p>
              </td>
             </tr>
            </tbody></table>'
        ],
        [
            'title' => 'Một số vấn đề cụ thể về QTG trong trường Đại học:',
            'user_id' => '1',
            'created_at' => now(),
            'content' => '<p class="MsoListParagraphCxSpFirst" style="text-indent:-.25in;mso-list:l0 level1 lfo1"><!--[if !supportLists]--><b><span style="font-size:13.0pt;line-height:107%;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US">1.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
            </span></span></b><!--[endif]--><b><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Tóm tắt về quyền tác giả (QTG):<o:p></o:p></span></b></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle" style="text-indent:-.25in;mso-list:l2 level1 lfo2"><!--[if !supportLists]--><span style="font-size:13.0pt;line-height:107%;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US">1)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
            </span></span><!--[endif]--><i><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Quyền tác giả (QTG)</span></i><span style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US">, tiếng Anh
            là <i>Copyrights</i>, là một loại quyền đối với các <i>tác phẩm sáng tạo</i>
            trong các lĩnh vực văn học, nghệ thuật và khoa học.<o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle" style="text-indent:-.25in;mso-list:l2 level1 lfo2"><!--[if !supportLists]--><span style="font-size:13.0pt;line-height:107%;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US">2)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
            </span></span><!--[endif]--><i><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Tác phẩm sáng tạo</span></i><span style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US">, tiếng Anh
            là <i>Creative Works</i>, hoặc nói gọn là <i>Tác phẩm (Works)</i>, là thành quả
            lao động sáng tạo (trí óc) của nhà văn, nhà thơ, nghệ sĩ, nhạc sĩ, nhà khoa học,
            lập trình viên, và những người làm công việc sáng tạo khác, gọi chung là các <i>Tác
            giả (Author)</i>.<o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Tác phẩm sáng tạo phải có hai yếu tố cơ bản: là
            tác phẩm <i>nguyên gốc</i> (không phải sao chép lại), và <i>có tính mới (sáng tạo)</i>.<o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Tác phẩm là <i>tài sản trí tuệ</i> của tác giả. Thuật
            ngữ <i>Sở hữu trí tuệ (SHTT)</i> là dịch từ tiếng Anh <i>Intellectual property
            (IP)</i>. <i>IP </i>có thể dịch sang tiếng Việt thành “<i>tài sản trí tuệ</i>”,
            tuy vậy thuật ngữ <i>“sở hữu trí tuệ”</i> đã được dùng quen.&nbsp;&nbsp; <o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle" style="text-indent:-.25in;mso-list:l2 level1 lfo2"><!--[if !supportLists]--><span style="font-size:13.0pt;line-height:107%;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US">3)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
            </span></span><!--[endif]--><i><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Luật pháp bảo vệ</span></i><span style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US"> tác phẩm, giống
            như bảo vệ tài sản trí tuệ và các loại tài sản nói chung khác.&nbsp; <br>
            <br>
            Để làm được việc đó Luật pháp xác định các <i>quyền (right) </i>đối với tác phẩm,
            tức các QTG. Đồng thời quy định các điều khoản để <i>bảo hộ (protect) </i>các
            quyền đó.<br>
            <br>
            Có hai loại QTG: <o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle" style="margin-left:.75in;mso-add-space:
            auto;text-indent:-.25in;mso-list:l1 level1 lfo3"><!--[if !supportLists]--><span style="font-size:13.0pt;line-height:107%;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US">-<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </span></span><!--[endif]--><i><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">quyền nhân thân</span></i><span style="font-size:
            13.0pt;line-height:107%;mso-ansi-language:EN-US"> (hay quyền đạo đức / tinh thần
            (<i>moral rights</i>) – liên quan trực tiếp đến tác giả, thí dụ: đặt tên cho
            tác phẩm, ghi tên hoặc bút danh; bảo vệ sự toàn vẹn (ngăn cấm việc cắt xén hoặc
            bóp méo) tác phẩm …, và<o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;<o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle" style="margin-left:.75in;mso-add-space:
            auto"><i><span style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US">-
            quyền tài sản</span></i><span style="font-size:13.0pt;line-height:107%;
            mso-ansi-language:EN-US"> (hay quyền kinh tế (<i>economic rights</i>) – liên
            quan đến việc khai thác giá trị kinh tế của tác phẩm, thí dụ: sao chép (làm bản
            sao), chuyển thể, trình diễn, và các quyền khác sẽ nói cụ thể sau.<br>
            <!--[if !supportLineBreakNewLine]--><br>
            <!--[endif]--><o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle" style="text-indent:-.25in;mso-list:l2 level1 lfo2"><!--[if !supportLists]--><span style="font-size:13.0pt;line-height:107%;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US">4)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
            </span></span><!--[endif]--><span style="font-size:13.0pt;line-height:107%;
            mso-ansi-language:EN-US">Trên phạm vị quốc tế QTG được bảo hộ bởi <i>Công ước
            Bern</i> về <i>bảo hộ các tác phẩm văn học nghệ thuật (</i></span><span class="alt-edited"><i><span lang="VI">1886</span></i></span><i><span style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US">)</span></i><span style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US">. Các nước
            tham gia Công ước Bern phải ban hành <i>Luật quốc gia về quyền tác giả</i> để cam
            kết và cụ thể hóa việc bảo hộ tại nước mình. &nbsp;<br>
            <br>
            Việt Nam tham gia Công ước Bern năm </span><span class="alt-edited"><span lang="VI">2007</span></span><span style="font-size:13.0pt;line-height:107%;
            mso-ansi-language:EN-US"> trong quá trình gia nhập Tổ chức thương mại thế giới
            (WTO), và ban hành <i>Luật Sở hữu trí tuệ Việt Nam (Luật SHTT)</i> năm 2005,
            trong đó có một phần về QTG. Luật này được sửa đổi năm 2009 và hiện đang được
            xem xét sửa đổi tiếp cho phù hợp với bối cảnh hội nhập kinh thế thế giới. Dưới
            luật SHTT có các <i>Nghị định</i> của Chính phủ hướng dẫn thi hành. Gần đây nhất
            là Nghị định </span><span lang="VI" style="font-size:12.0pt;line-height:107%;
            mso-fareast-font-family:&quot;Times New Roman&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;;
            color:black">Số: 22/2018/NĐ-CP</span><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">, NĐ này thay thế cho các nghị định tương tự ban
            hành trước đó.<o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle" style="text-indent:-.25in;mso-list:l2 level1 lfo2"><!--[if !supportLists]--><span style="font-size:13.0pt;line-height:107%;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US">5)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
            </span></span><!--[endif]--><span style="font-size:13.0pt;line-height:107%;
            mso-ansi-language:EN-US">&nbsp;Lưu ý trong tên
            tiếng Anh của QTG – <i>copyrights – </i>có hai phần: <i>copy</i> và <i>rights.</i><o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle" style="margin-left:.75in;mso-add-space:
            auto"><i><span style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US">Rights</span></i><span style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US"> – <i>các</i>
            <i>quyền</i>, chỉ ra rằng QTG gồm có <i>nhiều</i> quyền. <o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle" style="margin-left:.75in;mso-add-space:
            auto"><i><span style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US">Copy</span></i><span style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US"> – <i>sao
            chép</i>, chỉ ra rằng các quyền này liên quan đến việc <i>sao chép</i>. <o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle" style="margin-left:.75in;mso-add-space:
            auto"><i><span style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US">&nbsp;</span></i></p><p class="MsoListParagraphCxSpLast"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Hai chi tiết này nói rõ thực chất của QTG, cách dịch
            <i>copyrights</i> sang tiếng Việt thành <i>quyền tác giả</i> không phản ảnh được
            hết ngữ nghĩa (nội hàm) của khái niệm như trên, cần có sự giải thích.<o:p></o:p></span></p><p class="MsoNormal" style="margin-left:.5in"><span style="font-size:13.0pt;
            line-height:107%;mso-ansi-language:EN-US">Như vậy, QTG có liên quan đến việc <i>sao
            chép tác phẩm</i>. Một tác phẩm chỉ sao chép được nếu nó đã được <i>định hình</i>
            (cố định dưới một dạng thức vật lý), như viết ra, đánh máy ra, ghi âm, và các dạng
            thức định hình khác mà có thể sao chép được. Ý tưởng chưa được định hình (thể
            hiện) thì không sao chép được, nên <i>ý tưởng thuần túy</i> không có (không được
            bảo hộ về) QTG. <br>
            <br>
            </span><i><span style="font-size:12.0pt;line-height:107%;mso-ansi-language:
            EN-US">Để trình định hình tác phẩm, tác giả phải diễn đạt ý tưởng bằng sự sáng
            tạo của mình thông qua hình tượng, ngôn ngữ, bố cục, màu sắc, hình khối, âm
            thanh, v.v.. Đây là một quá trình sáng tạo vô tận. Nguyễn Du đọc “Đoạn trường
            tân thanh”, tiếp thu ý tưởng của tác phẩm đó, có thể đã liên tưởng đến hoàn cảnh,
            cuộc đời và số phận của mình và có lẽ của dân, nước mình, và sáng tạo nên “Truyện
            Kiều” bằng tiếng Việt (Nôm), với ngôn ngữ, hình tượng, và đặc biệt thể thơ lục
            bát. “Truyện Kiều” do vậy hoàn toàn là tác phẩm của Nguyễn Du, nó phóng tác “Đoạn
            trường tân thanh” (mượn ý tưởng), nhưng diễn đạt hoàn toàn bằng các phương tiện
            và hình thức mới.</span></i><span style="font-size:13.0pt;line-height:107%;
            mso-ansi-language:EN-US"> <o:p></o:p></span></p><p class="MsoNormal" style="margin-left:.5in"><span style="font-size:13.0pt;
            line-height:107%;mso-ansi-language:EN-US">Về nguyên tắc tác phẩm được bảo hộ
            QTG <i>ngay sau khi nó được định hình</i>, không cần bất kỳ thủ tục <i>đăng ký </i>nào.
            Tuy nhiên trong một số Luật quốc gia có quy định về việc đăng ký nhằm thuận tiện
            trong sử dụng và quản lý QTG.<o:p></o:p></span></p><p class="MsoNormal" style="margin-left:.5in"><span style="font-size:13.0pt;
            line-height:107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpFirst" style="text-indent:-.25in;mso-list:l2 level1 lfo2"><!--[if !supportLists]--><span style="font-size:13.0pt;line-height:107%;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US">6)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
            </span></span><!--[endif]--><i><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Người sở hữu</span></i><span style="font-size:
            13.0pt;line-height:107%;mso-ansi-language:EN-US"> tác phẩm: <o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Tác phẩm ban đầu thuộc về người sinh ra nó (trong
            <i>phần lớn</i> trường hợp chính là <i>tác giả</i>), tức tác giả là người sở hữu
            tác phẩm. Quyền sở hữu này có thể được <i>chuyển giao</i> theo luật cho đối tượng
            khác. Người được chuyển giao QTG trở thành <i>chủ sở hữu</i> <i>quyền</i>, hay <i>người
            nắm quyền</i> (<i>rights holder)</i> tiếp theo đối với tác phẩm.<o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle"><i><span style="font-size:13.0pt;
            line-height:107%;mso-ansi-language:EN-US">Chỉ có quyền tài sản mới có thể được
            chuyển giao</span></i><span style="font-size:13.0pt;line-height:107%;
            mso-ansi-language:EN-US">. Để chuyển giao QTG, có thể dùng các hình thức: <i>nhượng
            quyền</i> hoặc <i>cấp phép (cấp giấy phép - license) sử dụng</i> <i>quyền</i>. Các
            Luật quốc gia quy định cụ thể các hình thức và quy trình chuyển giao QTG.<br>
            <br>
            Trong một số <i>bối cảnh cụ thể</i>, chủ sở hữu quyền có thể <i>“từ bỏ”</i>
            QTG: thí dụ công bố tác phẩm lên internet (cho sử dụng tự do) hoặc cho sử dụng với
            một số điều kiện (thí dụ không vì mục đích thương mại). Một trường hợp khác là <i>giấy
            phép</i> <i>Creative Commons – CC</i>, hoặc <i>giấy phép</i> <i>GPL</i> (đối với
            phần mềm nguồn mở). Các trường hợp này thường áp dụng đối với các trường hợp / dự
            án cụ thể, và <i>vẫn căn cứ trên QTG – </i>dựa trên<i> các giấy phép</i>. <o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpLast" style="text-indent:-.25in;mso-list:l2 level1 lfo2"><!--[if !supportLists]--><span style="font-size:13.0pt;line-height:107%;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US">7)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
            </span></span><!--[endif]--><i><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Bảo hộ QTG</span></i><span style="font-size:13.0pt;
            line-height:107%;mso-ansi-language:EN-US"> dịch từ thuật ngữ tiếng Anh <i>copyrights
            protect(ion)</i>. Khái niệm <i>protect</i> sẽ được dịch là “<i>bảo hộ</i>” đối
            với các QTG, và được dịch là “<i>bảo vệ</i>” đối với tác giả, người nắm quyền. &nbsp;&nbsp;&nbsp;<o:p></o:p></span></p><p class="MsoNormal" style="margin-left:.5in"><span style="font-size:13.0pt;
            line-height:107%;mso-ansi-language:EN-US">Bảo hộ gắn với việc trao cho chủ sở hữu
            (tác giả hoặc người nắm quyền) <i>quyền độc quyền</i> (<i>exclusive rights</i>)
            đối với việc khai thác tác phẩm. Tức là người nắm QTG có thể <i>tự thực hiện</i>,
            <i>cho phép hoặc cấm</i> người khác thực hiện một số quyền tác giả. <br>
            <br>
            Khai thác quyền mà không được phép của chủ sở hữu gọi là <i>hành vi vi phạm</i>
            quyền tác giả. Luật quốc gia quy định các hành vi vi phạm QTG cụ thể, cũng như
            các hình thức xử lý đối với hành vi vi phạm đó.</span><o:p></o:p></p><p class="MsoNormal" style="margin-left:.5in"><span style="font-size:13.0pt;
            line-height:107%;mso-ansi-language:EN-US">Để khai thác hợp pháp QTG phải <i>xin
            phép</i> và được sự đồng ý của chủ sở hữu quyền, và trong nhiều trường hợp phải
            <i>trả tiền đền bù</i> cho chủ sở hữu quyền, trừ một số trường hợp cụ thể được
            quy định trong Luât quốc gia về các <i>hạn chế</i> (giới hạn – <i>limitation</i>)
            và <i>ngoại lệ</i> (<i>exception</i>) đối với QTG. <o:p></o:p></span></p><p class="MsoListParagraphCxSpFirst" style="text-indent:-.25in;mso-list:l2 level1 lfo2"><!--[if !supportLists]--><span style="font-size:13.0pt;line-height:107%;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US">8)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
            </span></span><!--[endif]--><i><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Thời hạn</span></i><span style="font-size:13.0pt;
            line-height:107%;mso-ansi-language:EN-US"> <i>bảo hộ QTG</i>: Các quyền tinh thần
            thường không có thời hạn. Các quyền tài sản thường kéo dài một thời gian, thường
            là 50 năm sau cái chết của tác giả.<br>
            Các tác phẩm hết hạn bảo hộ QTG thuộc về <i>khu vực công</i> – là các tác phẩm
            công cộng, có thể khai thác và sử dụng miễn phí các quyền tài sản, nhưng phải
            tôn trọng các quyền tinh thần. <o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle" style="text-indent:-.25in;mso-list:l2 level1 lfo2"><!--[if !supportLists]--><span style="font-size:13.0pt;line-height:107%;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US">9)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
            </span></span><!--[endif]--><span style="font-size:13.0pt;line-height:107%;
            mso-ansi-language:EN-US">Nguyên tắc chung của luật pháp về bảo hộ QTG là <i>bảo
            vệ các lợi ích hợp pháp của tác giả và chủ sở hữu quyền,</i> đồng thời <i>không
            xâm hại quyền lợi hợp pháp của người dùng</i>, cũng như các <i>lợi ích xã hội
            và cộng đồng</i>.<o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Luật QTG quốc gia quy định các điều khoản cụ thể
            để đảm bảo điều hòa các lợi ích trên đây trong bối cảnh quốc gia, cũng như bối
            cảnh hội nhập quốc tế có liên quan.<o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle" style="text-indent:-.25in;mso-list:l2 level1 lfo2"><!--[if !supportLists]--><span style="font-size:13.0pt;line-height:107%;mso-fareast-font-family:&quot;Times New Roman&quot;;
            mso-bidi-font-family:&quot;Times New Roman&quot;;mso-ansi-language:EN-US">10)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;"> </span></span><!--[endif]--><span style="font-size:13.0pt;line-height:107%;mso-ansi-language:EN-US">&nbsp;&nbsp;Bảo hộ QTG là một sự nghiệp, một nhiệm vụ phức
            tạp và khó khăn, đặc biệt trong bối cảnh công nghệ hiện tại, có nhiều phương tiện
            và công cụ vừa hỗ trợ cho việc bảo hộ, nhưng cũng tạo thuận lợi cho việc vi phạm.
            <o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Trong phạm vi quốc gia, một hệ thống thực hành (<i>execution</i>)
            hiệu quả QTG bao gồm: luật về QTG, hệ thống thực thi <i>(enforcement)</i> xử lý
            các vi phạm, và hệ thống quản trị - trong đó có các tổ chức <i>quản trị tập thể
            quyền</i> (<i>collective rights management – CRM</i>). &nbsp;&nbsp;<o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Trong từng lĩnh vực lại có các vấn đề cụ thể
            riêng về bảo hộ QTG. Thí dụ trong các Trường đại học, và trong giáo dục đại học
            và giáo dục nói chung. các vấn đề bảo hộ QTG liên quan cả đến các tác giả, chủ
            sở hữu quyền, và người sử dụng các tác phẩm được bảo hộ QTG. Áp dụng các <i>kinh
            nghiệm thực tiễn tốt</i> (<i>best practices</i>) luôn là một chủ đề được quan
            tâm hàng đầu. <o:p></o:p></span></p><p class="MsoListParagraphCxSpMiddle"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">&nbsp;</span></p><p>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            </p><p class="MsoListParagraphCxSpLast"><span style="font-size:13.0pt;line-height:
            107%;mso-ansi-language:EN-US">Đây cũng là một lĩnh vực ứng dụng quan trọng các
            công cụ Tin học, từ phát triển các thuật toán và phần mềm giải quyết các bài
            toán cụ thể, đến xây dựng các CSDL và HTTT chuyên về QTG và bảo hộ QTG.<o:p></o:p></span></p>'
        ]
    ]
];
