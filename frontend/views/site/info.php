<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use \common\models\User;
use frontend\assets\AppAsset;

$this->title = 'Informacje';
$loggedUser = Yii::$app->user->identity->group_id; 
$friendlyUsers = User::find()->where(['in', 'group_id', $loggedUser])->orderBy('leader_points DESC')->all();

?>
<?php echo Html::a("Powrót do Panelu", ["site/index"],['class'=>'btn btn-lg task-btn dashboard-btn'])?>
<br>
<br>
<div class="site-about">
    <div class ="panel panel-primary text-center margin-bottom-">
    <div class="col-lg-12 panel-heading ">
        <t class = "inf-text"><?= Html::encode($this->title) ?></t>
    </div>
    </div>
    <br>
     <div class ="panel panel-info ">
    <div class="col-lg-12 panel-heading">
        „Projekt 18”
    </div>
    <div class ="panel-body">
        Witamy wszystkich śmiałków w specjalnie przygotowanym dla Was programie <b>„Projekt 18”</b>, który został wsparty mobilną aplikacją „RST Kopmpas”.<br>
       Wspólnie zaczynamy przygodową grę miejską, która będzie rozgrywana dwu etapowo w dwóch różnych miastach o łącznym czasie gry ponad 24 godziny.<br>
       Proponuje już zacząć ćwiczyć przysiady i rozciągać mięsnie nóg. <br><br>

       <b>Start: 07.10.2016 Piątek godzina 15.15 </b>– z pod biura RST Wrocław (Grupa Świdnica wyjazd 14.00 z pod Biura) Prosimy o punktualność spóźnialskich nie zabieramy.
        </div>
    </div>
    
    <div class ="panel panel-info ">
    <div class="col-lg-12 panel-heading">
        Jak się przygotować?
    </div>
    <div class ="panel-body">
        W zależności od warunków – trudno przewidzieć uroki tegorocznej jesieni ( z pewnością będzie lało) ale zabieramy:<br>
        <b>§</b> Wygodne buty <br>
        <b>§</b> Spodnie i kurtka nieprzemakalna (prognoza na deszcz)<br>
        <b>§</b> Plecak podręczny (rzeczy na zmianę)<br>
        <b>§</b> Telefony z aktywną aplikacją „RST Kompas”<br>
        <b>§</b> „Power Banki” dodatkowe ładowanie do telefonu (jeżeli ktoś ma)<br>
        <b>§</b> Dużo dobrego humoru i jeszcze więcej pozytywnej energii<br>
        <b>§</b> Zabieramy też ze sobą dystans do wszystkiego i wszystkich <br>
       </div>
    </div>
    
    <div class ="panel panel-info ">
    <div class="col-lg-12 panel-heading">
        Dekalog wyjazdu
    </div>
    <div class ="panel-body">
       <ol>
            <li> Miej uśmiech na twarzy w każdym momencie</li>
            <li> Bądź przygotowany na wszystko w każdej sytuacji </li>
            <li> Nie bluźnij na drużynę przeciwną, </li>
            <li> Nie bluźnij na pogodę,</li>
            <li> Wspieraj słabszych w swojej drużynie</li>
            <li> Dąż do celu wszelkimi twórczymi, ale uczciwymi  drogami</li>
            <li> Dobrze się baw i zarażaj dobrą zabawą innych</li>
            <li> Działaj kreatywnie i szanuj pomysłowość pozostałych</li>
            <li> Nie poddawaj się , nawet gdy będzie naprawdę ciężko</li>
            <li> Działaj na 100 %</li>
        </ol>
        </div>
    </div>
    
    <div class ="panel panel-info ">
    <div class="col-lg-12 panel-heading">
        Rozkład Jazdy
    </div>
        <div class ="panel-body">
            <b>07.10.2016 Piątek</b><br>
            <ul>
                <li>14.00 – Podstawienie busów – grupa Świdnica<br>
                <i>Dla grupy z oddziału Świdnicy zostanie podstawiony Bus, Transport do głównego biura – Wrocław. Wspólny start imprezy.</i>
                <li>15.30 – Start programu „Projekt 18” cz. I – Biuro RST Wrocław 
                <li>20.30 – 21.00 – zakwaterowanie w Hotelu
                <li>Czas wolny (basen, sauna, jacuzzi)
                <li>22.00 – 24.00 – Kolacja w hotelu – forma grillowa
                <li>Muzyka klubowa DJ<br>
            </ul>
            <b>08.10.2016 Sobota</b><br>
            <ul>
                <li>08.30 – 09.30 – Śniadanie
                <li>10.00 – 17.00 –  „Projekt 18” cz. II
                <li>Obiad w terenie
                <li>18.00 – 20.00 – Powrót do Hotelu – Czas wolny (basen, sauna, jacuzzi)
                <li>20.00 – 02.00 – Kolacja uroczysta
                <li>Muzyka DJ<br>
            </ul>
            <b>04.10.2015 Niedziela</b><br>
            <ul>
                <li>08.00 – 09.00 – Śniadanie
                <li>09.30 – 10.00 – Wykwaterowanie – wyjazd grupy
            </ul>
        </div>
    </div>
   
    <div class="panel panel-info">
        <div class="panel-heading"> 
        Twoja kompania 
        </div>

        <div class="panel-body">
			<?php
			$foundLeader = false;
			foreach($friendlyUsers as $users){
				if(!$foundLeader){
					//if more than one leader have same leader_points, The fisrt User become a leader 
					echo $users->name, " ", $users->last_name, " (lider) <br>";
					$foundLeader = true;
				}
				else {
					echo $users->name, " ", $users->last_name, "<br>";
				}
			}
            
				
			?>
        </div>
    </div>
    
    <div class="panel panel-danger inf-dng">
        <div class ="panel-heading text-center">
       Miłej zabawy!
        </div>
    </div>
    
</div>
<?php 
function GroupColor(){
if(!Yii::$app->user->isGuest){
    echo "color-".common\models\Group::findOne(Yii::$app->user->identity->group_id)->color."";
}
}
?>    
