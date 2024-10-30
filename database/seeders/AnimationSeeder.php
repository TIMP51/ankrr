<?php

namespace Database\Seeders;

use App\Models\Animations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $animations =
            [
                [
                    'name'=>'Мастера Меча Онлайн',
                    'description'=>'Начало двадцать первого века, японский гений создал вселенную, релиз которой ждал весь мир «искусство меча». Геймеры получили возможность полного погружения. Новинка стала самой ожидаемой и десять тысяч образцов с молниеносной скоростью исчезли с прилавков. Все вошли в реальность, растворившись в ней и собрались в Городе. Появился создатель. Огромная черная тень пояснила участникам, что вернуться в реальный мир возможно только пройдя всю игру. Но есть один жестокий момент, виртуальная смерть означает и смерть в реальной жизни и пройти её наобум не получится. После громких слов создатель испарился, оставив игроков одних.',
                    'release_year'=>'2012-07-08',
                    'image'=>'1701188094.jpg',
                    'type_id'=>'1',
                    'studio_id'=>'1',
                    'user_id'=>'1',
                    'category_id'=>'2',
                ],
                [
                    'name'=>'Университет монстров',
                    'description'=>'Приквел хита от студии Pixar о знакомстве двух монстров – Майка и Салли. До того как устроиться в «Корпорацию монстров» Майк Вазовски и Джеймс Салливан были студентами, они оба учились в Университете на Страшильном факультете, где готовят будущих монстров. Но они далеко не сразу стали лучшими друзьями, на пути к дружбе оказалось множество неожиданных препятствий и весёлых студенческих приключений.',
                    'release_year'=>'2013-06-20',
                    'image'=>'1701186940.webp',
                    'type_id'=>'2',
                    'studio_id'=>'2',
                    'user_id'=>'1',
                    'category_id'=>'1',
                ],
                [
                    'name'=>'Трое из Простоквашино',
                    'description'=>'Начало истории дяди Федора, кота Матроскина и пса Шарика. За кадром – неподражаемые Олег Табаков и Лев Дуров',
                    'release_year'=>'1978-01-01',
                    'image'=>'1701188054.jpg',
                    'type_id'=>'3',
                    'studio_id'=>'3',
                    'user_id'=>'1',
                    'category_id'=>'2',
                ],
                [
                    'name'=>'Зверополис ',
                    'description'=>'Добро пожаловать в Зверополис – современный город, населенный самыми разными животными, от огромных слонов до крошечных мышек. Зверополис разделен на районы, полностью повторяющие естественную среду обитания разных жителей – здесь есть и элитный район Площадь Сахары и неприветливый Тундратаун. В этом городе появляется новый офицер полиции, жизнерадостная зайчиха Джуди Хоппс, которая с первых дней работы понимает, как сложно быть маленькой и пушистой среди больших и сильных полицейских. Джуди хватается за первую же возможность проявить себя, несмотря на то, что ее партнером будет болтливый хитрый лис Ник Уайлд. Вдвоем им предстоит раскрыть сложное дело, от которого будет зависеть судьба всех обитателей Зверополиса.',
                    'release_year'=>'2016-03-03',
                    'image'=>'zveropolis.webp',
                    'type_id'=>'2',
                    'studio_id'=>'1',
                    'user_id'=>'1',
                    'category_id'=>'3',
                ],
                [
                    'name'=>'Шрэк ',
                    'description'=>'Мультфильм "Шрэк" рассказывает историю об огре по имени Шрэк, который живёт уединённо на болоте. Однажды на его болото попадают люди и говорят теперь, что это собственность лорда Фаркуарда. Главный герой не хочет отдавать свою землю и идёт в замок к правителю, чтобы принять участие в турнире. Победитель состязания получит возможность спасти принцессу и попросить у лорда Фаркуарда за это любую награду.',
                    'release_year'=>'2001-10-31',
                    'image'=>'shrek1.webp',
                    'type_id'=>'2',
                    'studio_id'=>'4',
                    'user_id'=>'1',
                    'category_id'=>'2',
                ],
                [
                    'name'=>'Тайна Коко',
                    'description'=>'12-летний Мигель живёт в мексиканской деревушке в семье сапожников и тайно мечтает стать музыкантом. Тайно - потому что в его семейном клане музыка считается проклятием. Когда-то его прапрадед оставил свою жену, прапрабабку Мигеля, ради мечты, которая теперь не даёт спокойно жить Мигелю. С тех пор музыкальная тема в семье стала табу. Мигель обнаруживает, что между ним и его любимым певцом Эрнесто де ла Крусом, ныне покойным, существует некая - пока неназванная - связь. Паренёк отправляется к своему кумиру в Страну Мёртвых, где встречает души своих предков. Мигель знакомится там с духом-трикстером по имени Гектор (в облике скелета), который становится его проводником. Вдвоём они отправляются на поиски де ла Круса.',
                    'release_year'=>'2017-11-23',
                    'image'=>'1701432666.webp',
                    'type_id'=>'2',
                    'studio_id'=>'2',
                    'user_id'=>'1',
                    'category_id'=>'3',
                ],
                [
                    'name'=>'Как приручить дракона',
                    'description'=>'Мультфильм "Как приручить дракона" рассказывает историю о подростке по имени Иккинг. Будучи одним из викингов, ему необходимо драться с драконами и проявить себя на поле боя. Вот только, главный герой не особо жалует традиции своих соотечественников, предпочитая мирную жизнь. И вот, однажды парень находит дракона по имени Беззубик, что помогает ему переосмыслить многое.',
                    'release_year'=>'2010-03-18',
                    'image'=>'drakon1.jpg',
                    'type_id'=>'2',
                    'studio_id'=>'6',
                    'user_id'=>'1',
                    'category_id'=>'2',
                ],
                [
                    'name'=>' Душа ',
                    'description'=>'Сюжет рассказывает о Джо Гарднере, музыканте-джазовом пианисте из Нью-Йорка. В один судьбоносный день, когда он получает долгожданный шанс своей мечты исполниться на сцене с известной джазовой группой, он неожиданно попадает в мир между жизнью и смертью - мир душ.
В душевном мире Джо встречает новые души, которые готовятся к рождению на Земле. В поисках пути вернуться в своё тело, он сталкивается с душой по имени 22, которая никак не хочет отправляться на Землю, потому что считает, что жизнь там - это сложно и неинтересно.
В ходе удивительных приключений Джо и 22 отправляются в путешествие по различным областям и узнают больше о значимости каждого момента в жизни и о том, что делает каждую душу уникальной.',
                    'release_year'=>'2021-01-21',
                    'image'=>'1701436441.webp',
                    'type_id'=>'2',
                    'studio_id'=>'6',
                    'user_id'=>'1',
                    'category_id'=>'2',
                ],
                [
                    'name'=>'Человек-паук: Через вселенные ',
                    'description'=>'Обычный подросток Майлз Моралез учится в школе и мечтает о простых вещах. Он хочет получить хороший аттестат, завоевать уважение друзей и быть популярным среди местных школьниц. Но прежняя скучная жизнь заканчивается, когда парень обнаруживает у себя способности супергероя - умение плести прочную паутину, отличную выносливость и потрясающую ловкость. Майлз старательно скрывает от окружающих свои таланты, но продолжает детальное изучение новых навыков. Вскоре он узнает, что у новой силы нет границ, и решает стать Человеком - пауком. Теперь по ночам парень выходит защищать родной город от хулиганов и бандитов.',
                    'release_year'=>'2018-12-13',
                    'image'=>'1701433543.jpg',
                    'type_id'=>'2',
                    'studio_id'=>'2',
                    'user_id'=>'1',
                    'category_id'=>'3',
                ],
                [
                    'name'=>'Холодное сердце ',
                    'description'=>'Действия мультфильма будут происходить в королевстве под названием Эренделл. Здесь проживают король и королева, которые занимаются воспитанием своих двоих любимых дочерей. Но только как они не старались, так и не смогли освободить старшую от магических сил которыми она обладала, она могла создать все что угодно, но при этом это было либо изо льда, либо со снега.
Однажды, когда она играла со своей младшей сестрой по имени Анна. Юная волшебница, сама того не желая, попала заклинанием Анне прямо в голову. Эльза сильно испугалась и сразу же побежала к своим родителям просить помощи. Родители тоже сильно перепугались и они понимают, что помочь в этой беде им могут только тролли. У них была старейшина Бэбби, и только с ее помощью удалось спасти бедную Анну, девочке пришлось стереть все воспоминания, которые были связанны с магией ее сестры. При этом Эльзе сообщают о том, что ей необходимо как можно скорее научиться контролировать свои способности, иначе это все в итоге может привести к большим проблемам.',
                    'release_year'=>'2013-12-12',
                    'image'=>'1701433556.jpg',
                    'type_id'=>'2',
                    'studio_id'=>'4',
                    'user_id'=>'1',
                    'category_id'=>'2',
                ],
                [
                    'name'=>'Звёздные войны: Сопротивление ',
                    'description'=>'Кадзуда Сионо — молодой пилот, недавно вступивший в ряды Сопротивления под командованием генерала Леи. Несмотря на юный возраст, Кадзуде поручают важное задание — разведать, чем занимается Первый орден.',
                    'release_year'=>'2018-01-01',
                    'image'=>'1701433625.jpg',
                    'type_id'=>'1',
                    'studio_id'=>'2',
                    'user_id'=>'1',
                    'category_id'=>'2',
                ],
                [
                    'name'=>'Я есть Грут ',
                    'description'=>'Приключения малыша Грута.',
                    'release_year'=>'2022-08-09',
                    'image'=>'1701433589.webp',
                    'type_id'=>'3',
                    'studio_id'=>'5',
                    'user_id'=>'1',
                    'category_id'=>'2',
                ],
                [
                    'name'=>'Lego Звездные войны: Хроники Йоды — Скрытый клон ',
                    'description'=>'Наступило время тяжких испытаний. На просторах галактики бушует бесконечная война, где зловещий Дарк Сидиус и его приспешники состряпали новый план свержения Республики. Тем временем в академии джедаев, магистр Йода обучает молодых падаванов, не подозревая о надвигающейся беде. Под обличием друга, Палпатин заставил Йоду отправится на Альдераан, чтобы помочь Оби-Вану Кеноби. На планете его ждала западня, а пока академия была беззащитна, туда наведался генерал Гривус и похитил священный кристалл, способный оживить бессмертную армию. План тёмной стороны был в шаге от свершения, но они не ожидали, что юные джедаи отправятся в погоню за похитителем.',
                    'release_year'=>'2013-05-04',
                    'image'=>'1701433649.webp',
                    'type_id'=>'3',
                    'studio_id'=>'6',
                    'user_id'=>'1',
                    'category_id'=>'2',
                ],
                [
                    'name'=>'Ледниковый период ',
                    'description'=>'Действие разворачивается 20 тыс. лет назад. Чтобы избежать приближающегося из-за наступления ледникового периода холода, животные мигрируют на юг. Однако некоторые из них всё-таки решают остаться - одинокий, угрюмый мамонт Манфред, а также бесшабашный ленивец Сид.
Случайно эта парочка наталкивается на человеческого детёныша. Они решаются вернуть его людям и отправляются в путешествие. По пути они встречают саблезубого хитрого тигра. И теперь этой веселой компании предстоят забавные приключения!',
                    'release_year'=>'2002-08-21',
                    'image'=>'1701433641.webp',
                    'type_id'=>'2',
                    'studio_id'=>'6',
                    'user_id'=>'1',
                    'category_id'=>'2',
                ],
                [
                    'name'=>'Рик и Морти ',
                    'description'=>'В центре сюжета - школьник по имени Морти и его дедушка Рик. Морти - самый обычный мальчик, который ничем не отличается от своих сверстников. А вот его дедуля занимается необычными научными исследованиями и зачастую полностью неадекватен. Он может в любое время дня и ночи схватить внука и отправиться вместе с ним в безумные приключения с помощью построенной из разного хлама летающей тарелки, которая способна перемещаться сквозь межпространственный тоннель. Каждый раз эта парочка оказывается в самых неожиданных местах и самых нелепых ситуациях.',
                    'release_year'=>'2013-01-01',
                    'image'=>'RikMorty.webp',
                    'type_id'=>'1',
                    'studio_id'=>'4',
                    'user_id'=>'1',
                    'category_id'=>'4',
                ],
                [
                    'name'=>'Симпсоны',
                    'description'=>'Мультфильм - пародия на американский уклад жизни. Семейство Симпсонов состоит из пяти членов: папаша Гомер, мать семейства Мардж, их дочери, Лиза и Мэгги, и несносный подросток Барт.',
                    'release_year'=>'1989-01-01',
                    'image'=>'simpsons.jpg',
                    'type_id'=>'1',
                    'studio_id'=>'3',
                    'user_id'=>'1',
                    'category_id'=>'4',
                ],
                [
                    'name'=>' Неуязвимый',
                    'description'=>'17-летний Марк Грэйсон — сын самого могучего супергероя на Земле, и вскоре ему самому предстоит обрести суперспобности и научиться им управлять.',
                    'release_year'=>'2020-06-03',
                    'image'=>'nepobedimyj.webp',
                    'type_id'=>'1',
                    'studio_id'=>'4',
                    'user_id'=>'1',
                    'category_id'=>'5',
                ],
                [
                    'name'=>'ВАЛЛ-И',
                    'description'=>'Робот ВАЛЛ·И из года в год прилежно трудится на опустевшей Земле, очищая нашу планету от гор мусора, которые оставили после себя улетевшие в космос люди. Он и не представляет, что совсем скоро произойдут невероятные события, благодаря которым он встретит друзей, поднимется к звездам и даже сумеет изменить к лучшему своих бывших хозяев, совсем позабывших родную Землю.',
                    'release_year'=>'2008-06-01',
                    'image'=>'valli.webp',
                    'type_id'=>'2',
                    'studio_id'=>'2',
                    'user_id'=>'1',
                    'category_id'=>'2',
                ],
                [
                    'name'=>'Тачки',
                    'description'=>'Неукротимый в своем желании всегда и во всем побеждать гоночный автомобиль «Молния» Маккуин вдруг обнаруживает, что сбился с пути и застрял в маленьком захолустном городке Радиатор-Спрингс, что находится где-то на трассе 66 в Калифорнии.

Участвуя в гонках на Кубок Поршня, где ему противостояли два очень опытных соперника, Маккуин совершенно не ожидал, что отныне ему придется общаться с персонажами совсем иного рода. Это, например, Салли — шикарный Порше 2002-го года выпуска, Док Хадсон — легковушка модели «Хадсон Хорнет», 1951-го года выпуска или Метр — ржавый грузовичок-эвакуатор. И все они помогают Маккуину понять, что в мире существуют некоторые более важные вещи, чем слава, призы и спонсоры…',
                    'release_year'=>'2006-03-14',
                    'image'=>'tachki1.webp',
                    'type_id'=>'2',
                    'studio_id'=>'5',
                    'user_id'=>'1',
                    'category_id'=>'2',
                ],
                [
                    'name'=>'Блич: Тысячелетняя кровавая война',
                    'description'=>'Конец близок. "Готей 13" под угрозой полного уничтожения. Старый могущественный враг всех шинигами вновь объявляет войну Обществу душ. И это не кто иной, как сами квинси, возглавляемые новым императором Ванденрейха, зовущим себя Яхве. И цель его ясна, как блеск клинка занпакто. Он хочет убить Короля душ, захватить трон и на руинах построить свою новую империю. Так пламя тысячелетней кровавой войны разгорается с новой силой, а грядущая битва потрясёт оба мира и изменит судьбы многих. Насколько тяжёлым будет это испытание? А такие ли они хорошие, эти шинигами? И какой может быть цена победы в однажды начатой войне? Придётся узнать ответ…',
                    'release_year'=>'2022-10-11',
                    'image'=>'bleachVoina.jpg',
                    'type_id'=>'1',
                    'studio_id'=>'2',
                    'user_id'=>'1',
                    'category_id'=>'4',
                ],
                [
                    'name'=>'Ван-Пис',
                    'description'=>'Главный герой этой истории - парень в соломенной шляпе по имени Монки Д. Луффи. Все о чем мечтает наш герой - это приключения и путешествия. Будучи маленьким ребенком, он съедает дьявольский фрукт и становится резиновым человеком. Теперь у него есть необычная способность - он может растягивать свое тело и конечности до любых размеров. Сейчас перед Луффи стоит цель - стать главным среди пиратов. Но для этого, судя по легендам, необходимо добраться до древнего сокровища Ван Пис. Когда-то сам Гол Д. Роджер спрятал его где-то на Гранд Лайн, течении, которое объединяет множество островов по всему миру. Наш весельчак решает отправиться на их поиски.
Однако, наш персонаж далеко не единственный, кто охотится за золотом Роджера. Казалось бы, у нашего смышленого парня есть всё, для того чтобы стать королем - необычайная сила и острый ум. Не хватает только одного - верной и преданной команды, которые последуют за своим капитаном навстречу любой опасности. Вот только Луффи стоит поторопиться, ведь за Ван Пис идет целая ватага злобных пиратов, которая не остановится ни перед чем, чтобы добраться до заветного сокровища. Монки придется предпринять немало усилий, чтобы опередить всех своих соперников.',
                    'release_year'=>'1999-10-20',
                    'image'=>'onepiece.webp',
                    'type_id'=>'1',
                    'studio_id'=>'3',
                    'user_id'=>'1',
                    'category_id'=>'4',
                ],
                [
                    'name'=>'Клинок, рассекающий демонов ',
                    'description'=>'Эпоха «Тайсё» была полна неожиданностей. Много легенд нашли свое логическое подтверждение в те года. Люди давненько стали думать о присутствии демонов в гущах леса. И эти существа были крайне опасны и кровожадны. В ночное время суток они вели охоту на людей, убивая невинных граждан, демоны питались их плотью. Однако со временем эти легенды стали больше напоминать сказки. Подобных инцидентов в лесах не происходило, люди перестали верить. И было это зря, ведь несколько лет назад с отцом главного героя – Танджиро Камадо случилась неприятность.
Тот пропал при странных обстоятельствах, а юноша взвалил на себя ответственность за семью. Когда Танджиро отправился продавать уголь, он не думал, что при возвращении домой застанет кровавую картину. Его родственники были убиты. Семья растерзана, и везде по дому виднеются следы крови. Единственный человек оставшийся в живых – сестренка главного героя. Она рассказала о демонах пришедших из леса в их дом. Оказалось, что девушка была ими обращена и скоро может стать убийцей. Герою истории нужно следить за поведением сестры и мстить за смерть матери и младшего братика.',
                    'release_year'=>'2019-04-06',
                    'image'=>'klinokDemonov.jpg',
                    'type_id'=>'1',
                    'studio_id'=>'3',
                    'user_id'=>'1',
                    'category_id'=>'4',
                ],
                [
                    'name'=>'Наруто: Ураганные хроники ',
                    'description'=>'Много невзгод и проблем встретил Наруто Узумаки – великий ниндзя. Прошли экзамены на повышение квалификации, прошли долгие годы, где горечь и боль, с переменным успехом, заменились на радость и счастье. Наруто стал взрослее, умнее, быстрее и сильнее. Предательство за предательством его закалили, а его настоящие друзья определились в беде. Теперь, после двух лет обучения у знаменитого на весь мир отшельника Джирайя, Узумаки готов к новым приключениям, ведь грядет новая эра.
К тому же, каждый из тех, кто окружал Наруто в его нелегком деле – выпускники школы ниндзя – тоже прошли квалификацию и кто-то стал тюнином или дзенином. К тому же, теперь они ученики трех великих санинов. Сакура стала работать под предводительством мадам Цунадэ, а Саскэ стал работать с Орочимару. Постепенно, всплывают старые тайны, которые мешают жить нормально. Надежда все еще есть, но грядет что-то более ужасающее – война синоби.',
                    'release_year'=>'2007-02-15',
                    'image'=>'narutoHroniki.jpg',
                    'type_id'=>'1',
                    'studio_id'=>'1',
                    'user_id'=>'1',
                    'category_id'=>'3',
                ],
                [
                    'name'=>'Атака титанов 2 ',
                    'description'=>'Сто лет назад человечество было уничтожено страшными загадочными существами, которым дали прозвище Титаны. Гигантские создания беспощадно нападали на города, разрушая жилища людей и пожирая всё подряд. Ужасающая ситуация вынудила тех, кому посчастливилось выжить, скрыться за высокими стенами. Однако прошёл век и неожиданно появился очередной враг, нарушивший умиротворённое существование народа. Гигант с лёгкостью пробил защитное ограждение и привёл с собой толпу кровожадных собратьев. Так и началась очередная схватка за жизнь.
Когда огромнейшая часть населения погибла, а потери приобрели катастрофический характер, солдаты внезапно выяснили, что жестокие титаны прячутся среди горожан. Через пять лет бесстрашным защитникам удалось схватить одного из скрывавшихся противников – Анни Леонхарт. У землян появилась возможность выяснить причины ожесточённого поведения великанов. Желая понять, почему ликвидируются последние люди, герои даже не подозревают, с какими потрясениями они вскоре столкнутся.',
                    'release_year'=>'2017-02-01',
                    'image'=>'atakaTitan2.jpg',
                    'type_id'=>'1',
                    'studio_id'=>'1',
                    'user_id'=>'1',
                    'category_id'=>'5',
                ],
                [
                    'name'=>'Моб Психо 100 ',
                    'description'=>'Человеческий мир заполонили разнообразные духи. Больше никого нельзя удивить присутствием потустороннего создания. Новоявленные обитатели Земли ведут себя довольно дерзко. Они обожают бедокурить и приносить вред. Чтобы приостановить деятельность невидимых существ, стали появляться специальные люди, именуемые экстрасенсами. Они умеют ловко сражаться с монстрами и отправлять их в привычную обстановку. Моб, или Шигэо Кагэяма – один из борцов с нечистью.
Главный герой не суровый мужчина, а простой ученик восьмого класса, который с ранних лет поражал окружающих своими уникальными способностями. Парнишка старается не использовать дар в повседневности, чтобы не отвлекать от учебы одноклассников. Но больше всего ему не хочется тревожить одну девушку, к которой питает нешуточную симпатию. После уроков, юноша совершенствует свои таланты, занимаясь с местным ясновидящим, который в реальности является рядовым шарлатаном. Хитрый мужчина сразу рассмотрел в мальчике перспективного деятеля и начал пользоваться его умениями, зарабатывая немалые деньги.',
                    'release_year'=>'2016-07-11',
                    'image'=>'mobPsiho.jpg',
                    'type_id'=>'1',
                    'studio_id'=>'4',
                    'user_id'=>'1',
                    'category_id'=>'2',
                ],
                [
                    'name'=>'Магическая битва ',
                    'description'=>'Юдзи Итадори — сильный юноша, который ведёт заурядную жизнь старшеклассника. Однажды, чтобы спасти друзей от нападения проклятий, он съедает палец Двуликого призрака, который становится частью его души. С этого момента он делит с ним своё тело. Под присмотром Сатору Годзё, одного из сильнейших магов, Итадори поступает в магический техникум, где учат сражаться с проклятиями.',
                    'release_year'=>'2020-10-3',
                    'image'=>'magBitva.jpg',
                    'type_id'=>'1',
                    'studio_id'=>'5',
                    'user_id'=>'1',
                    'category_id'=>'2',
                ],
                [
                    'name'=>'Семья шпиона ',
                    'description'=>'Над миром нависла страшная угроза! Шпиону «Сумраку» предстоит выполнить сложнейшую миссию в своей карьере… стать примерным семьянином. Под видом любящего мужа и отца он должен проникнуть в элитную школу и сблизиться с верхами мира политики. На первый взгляд прикрытие вышло великолепное, во только его жена — наёмная убийца. И супруги не знают о настоящей работе друг друга… В курсе только их приёмная дочь-телепат!',
                    'release_year'=>'2022-04-09',
                    'image'=>'semyaSHpion.jpg',
                    'type_id'=>'1',
                    'studio_id'=>'6',
                    'user_id'=>'1',
                    'category_id'=>'2',
                ],
                [
                    'name'=>'Твоё имя',
                    'description'=>'Действие в аниме Твое имя будет происходить в двух городах. Главными героями является парочка обычных людей, которые даже не подозревают, что вскоре судьба свяжет их жизни очень крепко. Они никогда не были знакомы, она – любимая дочь, которая свое свободное время посвящает работе в храме. Он – надежный друг, успешен и трудолюбив на работе, имеет неплохие задатки талантливого художника. Ее жизнь спокойна и размерена в небольшом провинциальном городке, в то время как он живет в огромном мегаполисе, полном суматохи и постоянном бегстве.
Мицуха Миямизу и Таки Тачибана никогда не встречали друг друга, и тем не менее, их связывает одно странное событие. Однажды во сне они меняются телами и совершенно непонятно как контролировать этот процесс. Такое начинает повторятся все чаще и чаще, что создаст немало проблем в жизни наших героев, ведь просыпаться каждый день в чужой постели в чужом доме не очень приятно. Но в чем же причина таких необычных метаморфоз? Именно в этом придется разобраться главным героям.',
                    'release_year'=>'2016-08-26',
                    'image'=>'tvoeImya.jpg',
                    'type_id'=>'2',
                    'studio_id'=>'6',
                    'user_id'=>'1',
                    'category_id'=>'2',
                ],
                [
                    'name'=>'Ванпанчмен ',
                    'description'=>'Мы все привыкли, что комиксы наполнены различными злодеями, безумцами с планом захвата планеты и прочими неприятностями. Город Зет-Сити уже давно привык к такому роду событий, постоянными захватчиками из других миров и прочими бедствиями. Самое важное, чтобы всегда вовремя появился супергерой, которой справится со всеми проблемами и сможет победить всех злодеев. Таким является парень по имени Сайтама. Вот только он выбивается из общего фона в жизни типичного города из комикса. Он невысокий, не может вести себя достаточно пафосно и не говорит высокопарных речей. Более того, внешний вид нашего героя состоит из простой одежды, а на голове нет ни одной волосинки.
В прошлом Сайтама был обычным человеком, который потерял свою работу. Только благодаря своему терпению и постоянным тренировкам он смог за три года стать самым сильным в мире. Чтобы победить врага, ему достаточно все лишь один раз ударить соперника, как тот окажется поверженным. Вот только теперь у него серьезная проблема – нет достойных соперников, и теперь вся это супергеройская жизнь превратилась для него в настоящую рутину.',
                    'release_year'=>'2015-10-05',
                    'image'=>'onepunch.jpg',
                    'type_id'=>'1',
                    'studio_id'=>'2',
                    'user_id'=>'1',
                    'category_id'=>'4',
                ],

            ];
        foreach ($animations as $animation){
            Animations::insert($animation);
        }
    }
}
