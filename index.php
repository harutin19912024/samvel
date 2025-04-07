
<!-- Hero Section -->
<section id="hero" class="hero section accent-background">

    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5 justify-content-between">
            <div class="col-lg-12 order-2 order-lg-1 d-flex flex-column justify-content-center" style="height: 455px;box-shadow: -3px -5px 14px 2px;color: black;margin-bottom: 15px;">
                <div class="carousel-container">
                    <?php if(!empty($newses)):?>
                        <div class="carousel" id="newsFeed">
                            <?php foreach($newses as $news):?>
                                <?php
                                $imagePath = Yii::$app->params['adminUrl']. 'uploads/images/news/thumbnail/' . $news->id .'/'. $news->newsImages[0]->name;
                                ?>
                                <div class="carousel-item-news" style="margin-top: 10px;">
                                    <div class="col-lg-4 col-md-3" style="float: left;">
                                        <img src="<?=$imagePath?>" style="width: 360px;height: 250px;" onmouseover="zoomIn(<?=$news->newsImages[0]->id?>)" onmouseout="zoomOut(<?=$news->newsImages[0]->id?>)" id="zoomImage_<?=$news->newsImages[0]->id?>">
                                    </div>
                                    <div class="col-lg-8 col-md-3" style="float: left;">
                                        <a href="<?=Yii::$app->language?>/news/<?=$news->id?>"><?=$news->title?></a>
                                        <p><?=$news->short_description?></p>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <div class="row gy-5 justify-content-between">
            <div class="col-lg-12 order-1 order-lg-2" style="box-shadow: -3px -5px 14px 2px;color: black;height: 515px;">
                <table class="table table-bordered" style="margin-top: 5px;">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"><?=Yii::t('app','Exchange')?></th>
                        <th scope="col"><?=Yii::t('app','Buy')?></th>
                        <th scope="col"><?=Yii::t('app','Sell')?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($courses as $key=>$course):?>
                        <tr>
                            <th scope="row"><?=$i?></th>
                            <td><?=$key?></td>
                            <td><?=$course['sell']?></td>
                            <td><?=$course['buy']?></td>
                        </tr>
                        <?php $i++; endforeach;?>
                    </tbody>
                </table>
                <div class="gold-diagram">
                    <table class="table table-bordered" style="height: 55%;">
                        <thead>
                        <tr>
                            <th scope="col"><?=Yii::t('app', 'Gold')?></th>
                            <th scope="col"><?=Yii::t('app','Buy')?></th>
                            <th scope="col"><?=Yii::t('app','Sell')?></th>
                            <th scope="col"><?=Yii::t('app','+/-')?></th>
                            <th scope="col"><?=Yii::t('app','Date')?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($responseDataLocal->data as $goldPrice):?>
                            <?php if($goldPrice->rate_id != 1 && $goldPrice->rate_id != 2 && $goldPrice->rate_id != 8){
                                continue;
                            }?>
                            <tr>
                                <th scope="row"><?php if($goldPrice->rate_id == 1): ?>999 - 24K<?php elseif($goldPrice->rate_id == 2):?>995 - 24K<?php elseif($goldPrice->rate_id == 8):?>585 - 14K<?php endif;?></th>
                                <td><?=$goldPrice->buy?></td>
                                <td><?=$goldPrice->sell?></td>
                                <td>
                                    <?php if($goldPrice->yesterday_sell > $goldPrice->sell): ?>
                                        <span style="color: red;"><?php echo ceil(($goldPrice->yesterday_sell -  $goldPrice->sell) * 100) / 100;?></span>
                                    <?php else:?>
                                        <span style="color: green;">
                        <?php echo ceil(($goldPrice->sell -  $goldPrice->yesterday_sell) * 100) / 100;?></span>
                                    <?php endif;?></td>
                                <td><?=date('Y-m-d', strtotime($goldPrice->updated_at))?></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                    <a class="btn btn-lg" href="/more-details" style="width: 100%;background-color: #00323f;color: white;"><?=Yii::t('app', 'Show More')?></a>
                    <!--iframe title="advanced chart TradingView widget" lang="en" id="tradingview_6e6d6" frameborder="0" allowtransparency="true" scrolling="no" allowfullscreen="true" src="https://s.tradingview.com/kitco/widgetembed/?hideideas=1&amp;overrides=%7B%7D&amp;enabled_features=%5B%5D&amp;disabled_features=%5B%5D&amp;locale=en#%7B%22symbol%22%3A%22XAUUSD%22%2C%22frameElementId%22%3A%22tradingview_6e6d6%22%2C%22interval%22%3A%221%22%2C%22hide_side_toolbar%22%3A%221%22%2C%22allow_symbol_change%22%3A%221%22%2C%22save_image%22%3A%220%22%2C%22studies%22%3A%22%5B%5D%22%2C%22theme%22%3A%22light%22%2C%22style%22%3A%221%22%2C%22timezone%22%3A%22America%2FNew_York%22%2C%22withdateranges%22%3A%221%22%2C%22studies_overrides%22%3A%22%7B%7D%22%2C%22utm_source%22%3A%22www.kitco.com%22%2C%22utm_medium%22%3A%22widget_new%22%2C%22utm_campaign%22%3A%22chart%22%2C%22utm_term%22%3A%22XAUUSD%22%2C%22page-uri%22%3A%22www.kitco.com%2Fcharts%2Fgold%22%7D" style="width: 100%; height: 100%; margin: 0px !important; padding: 0px !important;"></iframe -->
                </div>
            </div>
        </div>
    </div>

    <div class="icon-boxes position-relative" data-aos="fade-up" data-aos-delay="200" id="rectangel-menu">
        <div class="container position-relative">
            <div class="row gy-4 mt-5">

                <div class="col-xl-4 col-md-4 col-sm-3" style="padding-left: 0;">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-gift"></i></div>
                        <h4 class="title"><a href="/donate" class="stretched-link"><?=Yii::t('app', 'Donate')?></a></h4>
                    </div>
                </div><!--End Icon Box -->

                <div class="col-xl-4 col-md-4 col-sm-3">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-hammer"></i></div>
                        <h4 class="title"><a href="/auction" class="stretched-link"><?=Yii::t('app', 'Auction')?></a></h4>
                    </div>
                </div><!--End Icon Box -->

                <div class="col-xl-4 col-md-4 col-sm-3" style="padding-right: 0;">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-gem"></i></div>
                        <h4 class="title"><a href="/briliant" class="stretched-link"><?=Yii::t('app', 'Diamond')?></a></h4>
                    </div>
                </div><!--End Icon Box -->
                <!-- https://themeforest.net/item/mirora-watch-and-luxury-store-bootstrap-4-template/22796373 -->

            </div>
        </div>
    </div>

</section><!-- /Hero Section -->


<!-- Stats Section -->
<section id="stats" class="stats section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 align-items-center">

            <div class="col-lg-5">
                <img src="/img/stats-img.svg" alt="" class="img-fluid">
            </div>

            <div class="col-lg-7">

                <div class="row gy-4">

                    <div class="col-lg-6">
                        <div class="stats-item d-flex">
                            <i class="bi bi-emoji-smile flex-shrink-0"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                                <p><strong><?=Yii::t('app', 'Online Clients')?></strong></p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-6">
                        <div class="stats-item d-flex">
                            <i class="bi bi-people flex-shrink-0"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                                <p><strong><?=Yii::t('app', 'Registered Clients')?></strong></p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-6">
                        <div class="stats-item d-flex">
                            <i class="bi bi-headset flex-shrink-0"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
                                <p><strong><?=Yii::t('app', 'Today\'s Visits')?></strong></p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-6">
                        <div class="stats-item d-flex">
                            <i class="bi bi-journal-richtext flex-shrink-0"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
                                <p><strong>Hard Workers</strong> <span>rerum asperiores dolor</span></p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </div>

    </div>

</section><!-- /Stats Section -->

<section id="staff" class="about section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2><?=Yii::t('app', 'Staff')?><br></h2>
        <p><?=$aboutUs['short_description']?></p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">
            <?php foreach($teams as $team):?>
                <?php
                $teamImage = Yii::$app->params['adminUrl']. 'uploads/images/team/' . $team['id'] .'/'. $team['image'];
                ?>
                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <img src="<?=$teamImage?>" class="img-fluid" alt="">
                        <h4><?=$team['fname'].' '.$team['sname']?></h4>
                        <span><?=$team['profession']?></span>
                        <div class="social">
                            <a href=""><i class="bi bi-twitter-x"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div><!-- End Team Member -->
            <?php endforeach;?>
        </div>

    </div>

</section><!-- /About Section -->

<section id="call-to-action" class="call-to-action section dark-background">
    <div class="container">
        <!-- Replace the image with an embedded YouTube video -->
        <div class="video-background">
            <iframe
                src="https://www.youtube.com/embed/PUyeOHIk0Vc?autoplay=1&amp;loop=1&amp;playlist=PUyeOHIk0Vc&amp;t=20&amp;mute=1&amp;playsinline=1&amp;controls=0&amp;showinfo=0&amp;autohide=1&amp;allowfullscreen=true&amp;mode=transparent"
                frameborder="0"
                allow="autoplay; encrypted-media"
                allowfullscreen
                class="video-iframe">
            </iframe>
        </div>

        <div class="content row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
            <div class="col-xl-10">
                <div class="text-center">
                    <a href="https://www.youtube.com/embed/eC_gZE6s7u0?autoplay=1&amp;loop=1&amp;playlist=eC_gZE6s7u0&amp;t=20&amp;mute=1&amp;playsinline=1&amp;controls=0&amp;showinfo=0&amp;autohide=1&amp;allowfullscreen=true&amp;mode=transparent"></a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Recent Posts Section -->

<!-- Contact Section -->
<section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gx-lg-0 gy-4">

            <div class="col-lg-4">
                <div class="info-container d-flex flex-column align-items-center justify-content-center">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3><?=Yii::t('app', 'Address')?></h3>
                            <p><?=$settings['address']?></p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3><?=Yii::t('app', 'Call Us')?></h3>
                            <p><?=$settings['site_phone']?></p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3><?=Yii::t('app', 'Email Us')?></h3>
                            <p><?=$settings['site_email']?></p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                        <i class="bi bi-clock flex-shrink-0"></i>
                        <div>
                            <h3><?=Yii::t('app', 'Open Hours')?>:</h3>
                            <p><?=$settings['work_time']?></p>
                        </div>
                    </div><!-- End Info Item -->

                </div>

            </div>

            <div class="col-lg-8">
                <div class="map-responsive" style="height: 450px;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3048.529914386416!2d44.506797176539166!3d40.17501897031453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406abddabe0c3071%3A0x4aa102e32cb6e5f7!2sGoldmember!5e0!3m2!1sen!2sam!4v1730750217913!5m2!1sen!2sam" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div><!-- End Contact Form -->

        </div>

    </div>

</section><!-- /Contact Section -->
