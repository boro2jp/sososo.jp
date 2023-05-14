<?php
/*
Template Name: access
*/
get_header();
?>
    <?php get_template_part( 'template-parts/key-visual/key-visual-page', null, ['title'=> get_the_title(), 'title-eg'=> 'ACCESS']); ?>
    <?php get_template_part( 'template-parts/breadcrumbs/breadcrumbs', 'none' ); ?>
    <main class="main top bottom">
        <section class="section bottom">
            <div class="inner">
                <table class="table top-access__table">
                    <tbody>
                    <tr>
                        <th>店舗名</td>
                        <td>BURGER×BURGER</td>
                    </tr>
                    <tr>
                        <th>営業時間</th>
                        <td>
                            11:00〜16:00(LO 15:30)<br>
                            18:00〜23:00(LO 22:30) 不定休
                        </td>
                    </tr>
                    <tr>
                        <th>定休日</th>
                        <td>月曜日</td>
                    </tr>
                    <tr>
                        <th>席数</th>
                        <td>15席</td>
                    </tr>
                    <tr>
                        <th>所在地</th>
                        <td>〒000-0000 東京都武蔵野市市中町000-00-0 サンムーン 1F</td>
                    </tr>
                    <tr>
                        <th>TEL/FAX</th>
                        <td>012-123-4567</td>
                    </tr>
                    <tr>
                        <th>アクセス</th>
                        <td>
                            JR吉祥寺駅南口から徒歩10分<br>
                            京王線吉祥寺駅南口から徒歩10分<br>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <section class="section bottom">
            <div class="top-access__map">
                <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3239.0235362419057!2d139.70955231525997!3d35.72563968018387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188dd58df071c5%3A0x27f5b0b8a414593c!2z44ixVE9NQVA!5e0!3m2!1sja!2sjp!4v1654931787997!5m2!1sja!2sjp"
                        width="100%"
                        height="450"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </section>
    </main>
<?php
get_footer();
