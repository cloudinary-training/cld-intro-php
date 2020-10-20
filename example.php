// print_r($cloudinary->uploadApi()->upload('./assets/cheesecake.jpg', ['public_id' => 'cheesecake']));

// echo $cloudinary->image('cheesecake')->scale(300) . "\n";

// print_r($cloudinary->uploadApi()->upload('./assets/face.jpg', ['public_id' => 'face']));

// echo $cloudinary->image('face') 
// -> resize(Resize::scale(200, 200))
// -> effect(Effect::sepia())->toUrl() . "\n";

// echo $cloudinary->image('cheesecake') 
// -> resize(Resize::scale()->height(200))
// -> effect(Effect::sepia())->toUrl() . "\n";

// CHAINED WORKS
// echo $cloudinary->image('face') 
// -> effect(Effect::cartoonify())
// -> roundCorners(CornerRadiusTrait::max())
// -> effect(Effect::outline(100) -> color(ColorValue::orange()))
// -> background(ColorValue::lightblue())
// -> resize(Resize::scale() -> height(300))
// ->toUrl() . "\n";

// DOCS
// echo $cloudinary->image("face", ["transformation" => [
//   ["effect" => "cartoonify"],
//   ["radius" => "max"],
//   ["effect" => "outline:100", "color" => "lightblue"],
//   ["background" => "lightblue"],
//   ["height" => 300, "crop" => "scale"]
// ]]) . "\n";

// (new Transformation('t_jpg_with_quality_30'))
//                         ->namedTransformation('crop_400x400')
//                         ->namedTransformation('fit_100x150')
//                         ->resize(Fill::fill()->height(80)),

// echo Media::fromParams("actor", array("transformation"=>array(
//   array("effect"=>"cartoonify"),
//   array("radius"=>"max"),
//   array("effect"=>"outline:100", "color"=>"lightblue"),
//   array("background"=>"lightblue"),
//   array("height"=>300, "crop"=>"scale")
//   )));

// $imageGroup = [
//     'name'      => 'Image', //group name
//     'iconClass' => 'fas fa-camera',
//     'items'     => [
//         [
//             'name'  => 'Scale', //subGroup name
//             'items' => [
//                 [
//                     (new Transformation())->resize(Scale::scale(300)),
//                     '(new Transformation())->resize(Scale::scale(300))',
//                 ],
//                 [
//                     (new Transformation())->resize(Scale::scale()->height(300)),
//                     '(new Transformation())->resize(Scale::scale()->height(300))',
//                 ],
//                 [
//                     (new Transformation())->resize(Scale::scale(300, 300)),
//                     '(new Transformation())->resize(Scale::scale(300, 300))',
//                 ],
//                 [
//                     (new Transformation())->resize(Scale::scale(300)->height(300)),
//                     '(new Transformation())->resize(Scale::scale(300)->height(300))',
//                 ],
//                 [
//                     (new Transformation())->resize(Scale::scale()->height(300)->aspectRatio(2.111)),
//                     '(new Transformation())->resize(Scale::scale()->height(300)->aspectRatio(2.111))',
//                 ],
//                 [
//                     (new Transformation())->resize(Scale::scale()->height(300)->aspectRatio('19:9')),
//                     "(new Transformation())->resize(Scale::scale()->height(300)->aspectRatio('19:9'))",
//                 ],
//                 [
//                     (new Transformation())->resize(Scale::scale()->height(300)->aspectRatio(19, 9)),
//                     '(new Transformation())->resize(Scale::scale()->height(300)->aspectRatio(19, 9))',
//                 ],
//             ],
//         ],
//         [
//             'name'  => 'Round Corners',
//             'items' => [
//                 [
//                     (new Transformation())->roundCorners(70),
//                     '(new Transformation())->roundCorners(70)',
//                 ],
//                 [
//                     (new Transformation())->roundCorners(70, 20),
//                     '(new Transformation())->roundCorners(70, 20)',
//                 ],
//                 [
//                     (new Transformation())->roundCorners(70, 20, 100),
//                     '(new Transformation())->roundCorners(70, 20, 100)',
//                 ],
//                 [
//                     (new Transformation())->roundCorners(70, 20, 100, 40),
//                     '(new Transformation())->roundCorners(70, 20, 100, 40)',
//                 ],
//                 [
//                     (new Transformation())->roundCorners(RoundCorners::max()),
//                     '(new Transformation())->roundCorners(RoundCorners::max())',
//                 ],
//             ],
//         ],
//         [
//             'name'     => 'Crop',
//             'publicId' => 'woman',
//             'items'    => [
//                 [
//                     (new Transformation())->resize(Crop::thumbnail(200, 200)),
//                     '(new Transformation())->resize(Crop::thumbnail(200, 200))',
//                 ],
//                 [
//                     (new Transformation())->resize(Crop::thumbnail(200, 200, Gravity::auto())),
//                     '(new Transformation())->resize(Crop::thumbnail(200, 200, Gravity::auto()))',
//                 ],
//                 [
//                     (new Transformation())->resize(Crop::thumbnail(200, 200)->position(10, 10)),
//                     '(new Transformation())->resize(Crop::thumbnail(200, 200)->position(10, 10))',
//                 ],
//                 [
//                     (new Transformation())->resize(
//                         Crop::thumbnail(200, 200)->gravity(
//                             Gravity::auto(FocalGravity::BODY)
//                         )
//                     ),
//                     '(new Transformation())->resize(Crop::thumbnail(200, 200)->gravity(
//     Gravity::auto(FocalGravity::BODY)
// ))',
//                 ],
//                 [
//                     (new Transformation())->resize(Crop::thumbnail(200, 200)->gravity(Gravity::north())),
//                     '(new Transformation())->resize(Crop::thumbnail(200, 200)->gravity(Gravity::north()))',
//                 ],
//                 [
//                     (new Transformation())->resize(Crop::thumbnail(200, 200, Gravity::face(CompassGravity::CENTER))),
//                     '(new Transformation())->resize(Crop::thumbnail(200, 200, Gravity::face(CompassGravity::CENTER)))',
//                 ],
//                 [
//                     (new Transformation())->resize(Crop::thumbnail(200, 200, Gravity::auto())->zoom(0.7)),
//                     '(new Transformation())->resize(Crop::thumbnail(200, 200, Gravity::auto())->zoom(0.7))',
//                 ],
//             ],
//         ],
//         [
//             'name'  => 'Pad',
//             'items' => [
//                 [
//                     (new Transformation())->resize(Pad::pad(200, 200)->background(Background::coral())),
//                     '(new Transformation())->resize(Pad::pad(200, 200)->background(Background::coral()))',
//                 ],
//                 [
//                     (new Transformation())->resize(Pad::pad(200, 200)->background(AutoBackground::borderContrast())),
//                     '(new Transformation())->resize(Pad::pad(200, 200)->background(AutoBackground::borderContrast()))',
//                 ],
//                 [
//                     (new Transformation())->resize(
//                         Pad::pad(200, 200)->background(
//                             AutoBackground::gradientFade(
//                                 Gradient::PREDOMINANT_GRADIENT,
//                                 2,
//                                 GradientDirection::DIAGONAL_DESC
//                             )
//                         )
//                     ),
//                     '(new Transformation())->resize(
//     Pad::pad(200, 200)->background(
//         AutoBackground::gradientFade(
//             Gradient::PREDOMINANT_GRADIENT,
//             2,
//             GradientDirection::DIAGONAL_DESC
//         )
//     )
// )',
//                 ],
//             ],
//         ],
//         [
//             'name'     => 'Crop & Scale',
//             'publicId' => 'woman',
//             'items'    => [
//                 [
//                     (new Transformation())
//                         ->resize(Crop::thumbnail(200, 200, Gravity::auto()))
//                         ->resize(Scale::scale(200, 200)),
//                     '(new Transformation())
//     ->resize(Crop::thumbnail(200, 200, Gravity::auto()))
//     ->resize(Scale::scale(200, 200))',
//                 ],
//             ],
//         ],
//         [
//             'name'  => 'Effects & Adjustments',
//             'items' => [
//                 [
//                     (new Transformation())->effect(Effect::sepia()),
//                     '(new Transformation())->effect(Effect::sepia())',
//                 ],
//                 [
//                     (new Transformation())->adjust(Adjust::saturation(82)),
//                     '(new Transformation())->adjust(Adjust::saturation(82))',
//                 ],
//                 [
//                     (new Transformation())->adjust(Adjust::tint(100, NamedColor::GREEN, NamedColor::RED)),
//                     '(new Transformation())->adjust(Adjust::tint(100, NamedColor::GREEN, NamedColor::RED))',
//                 ],
//                 [
//                     (new Transformation())->effect(
//                         Effect::shadow()->position(10, PVar::height()->divide()->numeric(50))->color(Color::green())
//                     ),
//                     '
//                     (new Transformation())->effect(
//     Effect::shadow()->position(10, PVar::height()->divide()->numeric(50))->color(Color::green())
// )',
//                 ],
//                 [
//                     (new Transformation())->adjust(Adjust::replaceColor(NamedColor::MAROON, 80, '2b38aa')),
//                     '(new Transformation())->adjust(Adjust::replaceColor(NamedColor::MAROON, 80, \'2b38aa\'))',
//                 ],
//                 [
//                     (new Transformation())->effect(Effect::outline(Outline::OUTER, 15, 200)->color(Color::orange())),
//                     '(new Transformation())->effect(Effect::outline(Outline::OUTER, 15, 200)->color(Color::orange()))',
//                 ],
//                 [
//                     (new Transformation())->effect(
//                         Effect::generic('outline:outer', 15, 200)->addParameter(Parameter::generic('co', 'orange'))
//                     ),
//                     '(new Transformation())->effect(
//     Effect::generic(\'outline:outer\', 15, 200)->addParameter(Parameters::generic(\'co\', \'orange\'))
// )',
//                 ],
//             ],
//         ],
//         [
//             'name'  => 'Format',
//             'items' => [
//                 [
//                     (new Transformation())->format(Format::auto()),
//                     '(new Transformation())->format(Format::auto())',

//                 ],
//                 [
//                     (new Transformation())->format(Format::png()),
//                     '(new Transformation())->format(Format::png())',
//                 ],
//             ],
//         ],
//         [
//             'name'  => 'Quality',
//             'items' => [
//                 [
//                     (new Transformation())->quality(70),
//                     '(new Transformation())->quality(70)',
//                 ],
//                 [
//                     (new Transformation())->quality(Quality::level(70)->chromaSubSampling(Chroma::C420)),
//                     ' (new Transformation())->quality(Quality::level(70)->chromaSubSampling(ChromaSubSampling::C420))',
//                 ],
//                 [
//                     (new Transformation())->quality(Quality::auto()),
//                     '(new Transformation())->quality(Quality::auto())',
//                 ],
//                 [
//                     (new Transformation())->quality(Quality::good()),
//                     '(new Transformation())->quality(Quality::good())',
//                 ],
//                 [
//                     (new Transformation())->quality(Quality::auto('best')),
//                     '(new Transformation())->quality(Quality::auto(\'best\'))',
//                 ],
//             ],
//         ],
//         [
//             'name'  => 'Named and Generic',
//             'items' => [
//                 [
//                     (new Transformation())->namedTransformation('fit_100x150'),
//                     '(new Transformation())->namedTransformation(\'fit_100x150\')',
//                 ],
//                 [
//                     (new Transformation('t_jpg_with_quality_30')),
//                     '(new Transformation(\'t_jpg_with_quality_30\'))',
//                 ],
//                 [
//                     (new Transformation('t_jpg_with_quality_30'))
//                         ->namedTransformation('crop_400x400')
//                         ->namedTransformation('fit_100x150')
//                         ->resize(Fill::fill()->height(80)),
//                     '(new Transformation(\'t_jpg_with_quality_30\'))
//     ->namedTransformation(\'crop_400x400\')
//     ->namedTransformation(\'fit_100x150\')
//     ->resize(Fill::fill()->height(80))',
//                 ],
//             ],
//         ],
//         [
//             'name'  => 'Overlay',
//             'items' => [
//                 [
//                     (new Transformation())->overlay('logo'),
//                     '(new Transformation())->overlay(\'logo\')',
//                 ],
//                 [
//                     (new Transformation())->underlay('logo'),
//                     '(new Transformation())->underlay(\'logo\')',
//                 ],
//                 [
//                     (new Transformation())->overlay(Layer::image('logo')->resize(Scale::scale(200, 200))),
//                     '(new Transformation())->overlay(Layer::image(\'logo\')->resize(Scale::scale(200, 200)))',
//                 ],
//                 [
//                     (new Transformation())->overlay(
//                         Layer::image('logo')->resize(Fill::fill(200, 200, Gravity::auto())),
//                         Position::north(10, 10)
//                     ),
//                     '(new Transformation())->overlay(
//     Layer::image(\'logo\')->resize(Fill::fill(200, 200, Gravity::auto())),
//     Position::north(10, 10)
// )',
//                 ],
//                 [
//                     (new Transformation())->overlay(
//                         Layer::text('my_text')->fontFamily(FontFamily::ARIAL)->fontSize(50)
//                     ),
//                     '(new Transformation())->overlay(
//     Layer::text(\'my_text\')->fontFamily(FontFamily::ARIAL)->fontSize(50)
// )',
//                 ],
//                 [
//                     (new Transformation())->overlay(
//                         Layer::text('Flowers')
//                              ->fontFamily(FontFamily::VERDANA)
//                              ->fontSize(75)
//                              ->fontWeight(FontWeight::BOLD)
//                              ->fontStyle(FontStyle::ITALIC)
//                              ->textDecoration(TextDecoration::UNDERLINE)
//                              ->letterSpacing(14)
//                     ),
//                     '(new Transformation())->overlay(
//     Layer::text(\'Flowers\')
//         ->fontFamily(FontFamily::VERDANA)
//         ->fontSize(75)
//         ->fontWeight(FontWeight::BOLD)
//         ->fontStyle(FontStyle::ITALIC)
//         ->textDecoration(TextDecoration::UNDERLINE)
//         ->letterSpacing(14)
// )',
//                 ],
//                 [
//                     (new Transformation())->overlay(
//                         Layer::text('Your Logo Here')->fontFamily(FontFamily::IMPACT)->fontSize(150)
//                              ->color(NamedColor::WHITE)
//                              ->effect(Effect::distortArc(-120)),
//                         Position::south()->y(140)
//                     ),
//                     '(new Transformation())->overlay(
//     Layer::text(\'Your Logo Here\')->fontFamily(FontFamily::IMPACT)->fontSize(150)
//         ->color(NamedColor::WHITE)
//         ->effect(Effect::distortArc(-120)),
//     Position::south()->y(140)
// )',
//                 ],
//                 [
//                     (new Transformation())->add3DLut('iwltbap_aspen.3dl'),
//                     '(new Transformation())->add3DLut(\'iwltbap_aspen.3dl\')',
//                 ],
//             ],
//         ],
//         [
//             'name'  => 'CustomParameter',
//             'items' => [
//                 [
//                     (new Transformation())->addGenericParam('w', 500),
//                     '(new Transformation())->addGenericParam(\'w\', 500)',
//                 ],
//             ],
//         ],
//     ],
// ];

// $videoGroup = [
//     'name'      => 'Video',
//     'iconClass' => 'fas fa-video',
//     'publicId'  => 'dog.mp4',
//     'items'     => [
//         [
//             'name'  => 'Trim',
//             'items' => [
//                 [
//                     (new Transformation())->trim(VideoRange::range(6.5, 10)),
//                     '(new Transformation())->trim(VideoRange::range(6.5, 10))',
//                 ],
//                 [
//                     (new Transformation())->trim(VideoRange::range('10p')->duration('30p')),
//                     '(new Transformation())->trim(VideoRange::range(\'10p\')->duration(\'30p\'))',
//                 ],
//             ],
//         ],
//         [
//             'name'  => 'Concatenate',
//             'items' => [
//                 [
//                     (new Transformation())
//                         ->resize(Fill::fill(300, 200))
//                         ->trim(VideoRange::range(0, 3))
//                         ->concatenate(
//                             Layer::video('kitten_fighting')
//                                  ->trim(VideoRange::range(2, 5))
//                                  ->resize(Fill::fill(300, 200))
//                         ),
//                     '(new Transformation())
//     ->resize(Fill::fill(300, 200))
//     ->trim(VideoRange::range(0, 3))
//     ->concatenate(
//         Layer::video(\'kitten_fighting\')
//             ->trim(VideoRange::range(2, 5))
//             ->resize(Fill::fill(300, 200))
//     )',
//                 ],
//             ],
//         ],
//         [
//             'name'  => 'Other',
//             'items' => [
//                 [
//                     (new Transformation())
//                         ->transcode(VideoCodec::h264(VideoCodecProfile::VCP_BASELINE, VideoCodecLevel::VCL_31)),
//                     '(new Transformation())
//     ->transcode(VideoCodec::h264(VideoCodecProfile::VCP_BASELINE, VideoCodecLevel::VCL_31))',
//                 ],
//                 [
//                     (new Transformation())->transcode(AudioFrequency::af22050()),
//                     '(new Transformation())->transcode(AudioFrequency::af22050())',
//                 ],
//                 [
//                     (new Transformation())->transcode(AudioCodec::none()),
//                     '(new Transformation())->transcode(AudioCodec::none())',
//                 ],
//                 [
//                     (new Transformation())->addSubtitles('sample_sub_en.srt'),
//                     '(new Transformation())->addSubtitles(\'sample_sub_en.srt\')',
//                 ],
//                 [
//                     (new Transformation())->effect(Effect::vignette(50))->effect(Effect::noise(90)),
//                     '(new Transformation())->effect(Effect::vignette(50))->effect(Effect::noise(90))',
//                 ],
//             ],
//         ],
//     ],
// ];

// /**
//  * Converts arrays to TransformationSample
//  *
//  * @param $group
//  *
//  * @return mixed
//  */
// function createSampleGroup($group)
// {
//     foreach ($group['items'] as &$subGroup) {
//         if (! isset($subGroup['publicId'])) {
//             $subGroup['publicId'] = isset($group['publicId']) ? $group['publicId'] : 'sample';
//         }

//         foreach ($subGroup['items'] as &$sampleArray) {
//             $sampleArray[]           = ($subGroup['publicId']);
//             $sampleArray             = ClassUtils::verifyVarArgsInstance($sampleArray, TransformationSample::class);
//             $sampleArray->keepSpaces = true;
//         }
//     }

//     return $group;
// }

// $page = new SamplePage(
//     'PHP SDK v2 Transformation Samples',
//     'Cloudinary - PHP SDK v2 Transformation Samples'
// );
// $page->addGroup(createSampleGroup($imageGroup));
// $page->addGroup(createSampleGroup($videoGroup));
// $page->currentNavLink = 0;
// echo $page;