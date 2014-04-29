﻿<?php
$string['pluginname'] = 'Розклад';
$string['pluginadministration'] = 'Керування розкладом';
$string['modulename'] = 'Розклад';
$string['modulename_help'] = 'Модуль діяльності "Розклад" допоможе Вам планувати зустрічі з Вашими студентами. 

Викладачі визначають часові інтервали для зустрічей, студенти вибирають їх у Moodle.
Викладачі можуть відмічати пристність студентів, результати зустрічі - та, опціонально, виставляти оцінки.

Підтримується створення розкладів для груп. Зокрема, в кожен інтервал часу може записатися кілька студентів. Опціонально, є можливість запланувати розклад прийому для всієї групи студентів одночасно.';
$string['modulename_link'] = 'mod/scheduler/view';
$string['modulenameplural'] = 'Розклади';

/* ***** Capabilities ****** */
$string['scheduler:addinstance'] = 'Добавити новий розклад';
$string['scheduler:appoint'] = 'Прийом';
$string['scheduler:attend'] = 'Записані студенти';
$string['scheduler:canscheduletootherteachers'] = 'Планувати графік прийому для інших викладачів кафедри';
$string['scheduler:canseeotherteachersbooking'] = 'Переглядати реєстрації інших викладачів';
$string['scheduler:disengage'] = 'Видалити всі графіки прийому (студенти)';
$string['scheduler:manage'] = 'Керувати вашими часовими інтервалами та графіками прийому';
$string['scheduler:manageallappointments'] = 'Керувати всією інформацією про розклад';
$string['scheduler:seeotherstudentsbooking'] = 'Переглядати реєстрації інших студентів на інтервалі';
$string['scheduler:seeotherstudentsresults'] = 'Переглядати результати інших студентів на інтервалі';

/* ***** Interface strings ****** */

$string['onedaybefore'] = '1 день до інтервалу';
$string['oneweekbefore'] = '1 тиждень до інтервалу';
$string['action'] = 'Дія';
$string['addappointment'] = 'Додати іншого студента';
$string['addondays'] = 'Додати графіки прийомів на';
$string['addscheduled'] = 'Додати студента в розклад';
$string['addaperiodsession'] = '+ інтервали - вільно';//@TDMU
$string['addsession'] = '+ інтервали - щотижня';
$string['addsingleslot'] = '+ окремий інтервал';
$string['addslot'] = 'Ви можете будь-коли створити додаткові інтервали прийому.';
$string['addstudenttogroup'] = 'Додати цього студента до групи в розкладі';
$string['allappointments'] = 'Всі графіки прийомів';
$string['allowgroup'] = 'Обмежений інтервал - клацніть щоб змінити';
$string['allslotsincloseddays'] = 'Всі інтервали були в зачинених днях';
$string['allteachersgrading'] = 'Викладачі можуть виставляти оцінки в усіх графіках прийому';
$string['allteachersgrading_desc'] = 'Якщо увімкнено, викладач зможе оцінювати прийоми, до яких він не приєднаний.';
$string['alreadyappointed'] = 'Запис на прийом неможливий. Інтервал часу повністю заповнений.';
$string['appointagroup'] = 'Прийом для групи';
$string['appointfor'] = 'Прийом для ';
$string['appointformygroup'] = 'Записати на прийом всю мою групу';
$string['appointingstudent'] = 'Графік прийому, що включає інтервал';
$string['appointingstudentinnew'] = 'Графік прийому для нового інтервалу';
$string['appointmentno'] = 'Запис {$a}';
$string['appointmentnotes'] = 'Примітки до графіку прийому';
$string['appointsolo'] = 'лише я';
$string['appointsomeone'] = 'Добавити новий графік прийому';
$string['appointmentsummary'] = 'Графік прийому на {$a->startdate} від {$a->starttime} до {$a->endtime} для {$a->teacher}';
$string['attendable'] = 'Можуть записатися';
$string['attendablelbl'] = 'Загалом кандидатів для запису';
$string['attended'] = 'Записані';
$string['attendedlbl'] = 'Кількість записаних студентів';
$string['attendedslots'] = 'Інтервали з записами';
$string['availableslots'] = 'Доступні інтервали';
$string['availableslotsall'] = 'Всього інтервалів';
$string['availableslotsnotowned'] = 'Не мої';
$string['availableslotsowned'] = 'Мої';
$string['bookwithteacher'] = 'Зареєстрував';
$string['break'] = 'Перерва між інтервалами прийому';
$string['breaknotnegative'] = 'Тривалість перерви між інтервалами прийому не може бути від\'ємною';
$string['cancelledbystudent'] = '{$a} : Прийом відмінений чи переміщений студентом';
$string['cancelledbyteacher'] = '{$a} : Прийом відмінений викладачем';
$string['choice'] = 'Вибір';
$string['chooseexisting'] = 'Виберіть існуючий';
$string['choosingslotstart'] = 'Виберіть час початку';
$string['comments'] = 'Примітки';
$string['complete'] = 'Відмічено';
$string['composeemail'] = 'Напишіть email:';
$string['confirmdelete'] = 'Повне видалення. Дійсно продовжити ?';
$string['conflictingslots'] = 'Конфлікти';
$string['course'] = 'Курс';
$string['csvencoding'] = 'Кодування текстового файлу';
$string['csvfieldseparator'] = 'Розділювач полів для csv';
$string['csvparms'] = 'Параметри файлу csv';
$string['csvrecordseparator'] = 'Розділювач записів для csv';
$string['cumulatedduration'] = 'Сумарна тривалість прийомів';
$string['date'] = 'Дата';
$string['datelist'] = 'Огляд';
$string['defaultslotduration'] = 'Тривалість інтервалу по-замовчуванню';
$string['defaultslotduration_help'] = 'Тривалість по-замовчуванню (в хвилнах) для інтервалу графіку прийому, що Ви налаштовуєте';
$string['deleteallslots'] = '- всі інтервали';
$string['deleteallunusedslots'] = '- всі незадіяні інтервали';
$string['deletemyslots'] = '- всі мої інтервали';
$string['deleteselection'] = 'Видалити вибрані інтервали';
$string['deletetheseslots'] = 'Видалити ці інтервали';
$string['deleteunusedslots'] = '- мої незадіяні інтервали';
$string['department'] = 'Звідки?';
$string['disengage'] = 'Знищити мої графіки прийому';
$string['displayfrom'] = 'Показати графік прийому студентам починаючи з';
$string['distributetoslot'] = 'Поширити на всю групу';
$string['divide'] = 'Ділити на інтервали?';
$string['dontforgetsaveadvice'] = 'Ви змінили перелік записаних на прийом осіб. Незабудьте збергти зміни у цій формі для підтвердження.';
$string['downloadexcel'] = 'Експортувати в Excel';
$string['downloads'] = 'Експортувати';
$string['duration'] = 'Тривалість';
$string['durationrange'] = 'Тривалість інтервалу прийому повинна бути від {$a->min} до {$a->max} хвилин.';
$string['emailreminder'] = 'Надіслати нагадування по email';
$string['emailreminderondate'] = 'Надіслати нагадування по email на';
$string['end'] = 'Кінець';
$string['enddate'] = 'Повторити інтервал до';
$string['endtime'] = 'Час закінчення';
$string['exclusive'] = 'Персональний';
$string['exclusivity'] = 'Персонально';
$string['exclusivitylockedto'] = 'Ви не можете змінити режим інтервалу при складанні розкладу. Поточний ліміт інтервалів призначення буде застосовано. Якщо це новий інтервал, ліміт по-замовчуванню в 1 буде застосовано.';
$string['exclusivityoverload'] = 'В інтервал записано {$a} студентів, що більше, ніж дозволяє цей параметр.';
$string['explaingeneralconfig'] = 'Це налаштування може бути встановлено лише на рівні сайту і буде застосовано для всіх розкладів у цьому Moodle.';
$string['exportinstructions'] = 'Найкраще - перед початком використння файл експорту, збережіть його на диску вашого комп\'ютера.';
$string['finalgrade'] = 'Остаточна оцінка';
$string['firstslotavailable'] = 'Перший інтервал буде відчинено о: ';
$string['for'] = 'для';
$string['forbidgroup'] = 'Груповий інтервал - клацніть щоб змінити';
$string['forcewhenoverlap'] = 'Примусово перекривати';
$string['forcourses'] = 'Виберіть студентів на курсі';
$string['friday'] = 'П\'ятниця';
$string['generalconfig'] = 'Загальні налаштування';
$string['grade'] = 'Оцінка';
$string['gradingstrategy'] = 'Методика оцінювання';
$string['gradingstrategy_help'] = 'Для розкладів в яких студенти можуть мати кілька записів, виберіть, яка оцінка буде остаточною. 
В журналі оцінок може відображатися або <ul><li>середня оцінка або</li><li>максимальна оцінка</li></ul> отримані студентом.';
$string['group'] = 'група ';
$string['groupbreakdown'] = 'За розміром групи';
$string['groupscheduling'] = 'Увімкнути заспис на прийом групами';
$string['groupscheduling_desc'] = 'Дозволяє записати на прийом усіх членів групи за один раз. 
(Незалежно від глобальних налаштувань, щоб увімкнути цю функціональність груповий режим для даного виду активності повинен бути встановлений у  "Показувати групи" чи "Відокремлені групи").';
$string['groupsession'] = 'Сесія для групи';
$string['groupsize'] = 'Розмір групи';
$string['guestscantdoanything'] = 'Гості не можуть нічого міняти тут.';
$string['howtoaddstudents'] = 'Застосовуйте налаштування ролей модуля щоб додати студентів до розкладу на глобальному ріні.<br/>Ви також можете застосуватии налаштування ролей у модулі для того, щоб вказати осіб-реєстраторів для ваших студентів.';
$string['ignoreconflicts'] = 'Не брати до уваги перекривання розкладів';
$string['ignoreconflicts_help'] = 'Якщо ця опція увімкнена, то інтервал прийому буде встановлено на вказану дату і час, навіть якщо існують інші інтервали прийому, з якими відбувається перекривання. Це може призвести до перекривання графіків прийому для викладачів та студентів, тому, використовуйте цю опцію обережно.';
$string['incourse'] = ' в курсі ';
$string['introduction'] = 'Вступ';
$string['invitation'] = 'Запрошення';
$string['invitationtext'] = 'Будь-ласка, виберіть інтервал часу для розкладу прийому о ';
$string['isnonexclusive'] = 'Не персональний';
$string['lengthbreakdown'] = 'По тривалості інтервалу';
$string['limited'] = 'Обмежено ({$a} залишилось)';
$string['location'] = 'Розміщення';
$string['markseen'] = 'будь-ласка, після зустрічі з студентом зробіть відмітку "Був присутній", поставивши відповідний прапорець та натиснувши посилання в таблиці вище.';
$string['markasseennow'] = 'Відмітити як присутнього зараз';
$string['maxgrade'] = 'Взяти найвищу оцінку';
$string['maxstudentsperslot'] = 'Максимальна кількість студентів на інтервал прийому';
$string['maxstudentsperslot_desc'] = 'Інтервали групового прийому / не-персональні інтервали прийому можуть мати не більше цієї кількості студентів. Примітка: на додаток, значення "необмежено" завжди може бути встановлено для інтервалу прийому.';
$string['maxstudentlistsize'] = 'Максимальна довжина списку студентів';
$string['maxstudentlistsize_desc'] = 'Максимальна довжина списку студентів, що потребують розкладу прийому, яка буде відображена у панелі викладача. Якщо студентів більше, список не буде відображено.';
$string['meangrade'] = 'Взяти оцінку по середньому';
$string['meetingwith'] = 'Зустріч з вами';
$string['meetingwithplural'] = 'Зустріч з вами';
$string['mins'] = 'хвилин';
$string['minutes'] = 'хвилин';
$string['minutesperslot'] = 'хвилин на інтервал';
$string['missingstudents'] = '{$a} студентів все ще потребують розкладу прийому';
$string['missingstudentsmany'] = '{$a} студентів все ще потребують розкладу прийому. Список не відображається через великий розмір.';
$string['mode'] = 'Режим';
$string['modeintro'] = 'Студенти можуть реєструватися';
$string['modeappointments'] = 'розклад(и) прийому(ів)';
$string['modeoneonly'] = 'в цьому розкладі';
$string['modeoneatatime'] = 'на час';
$string['modulename'] = 'Розклад';
$string['modulenameplural'] = 'Розклади';
$string['monday'] = 'Понеділок';
$string['move'] = 'Змінити';
$string['moveslot'] = 'Перемістити інтервал';
$string['multiplestudents'] = 'Дозволити багато студентів в інтервалі?';
$string['multicoursesteacherappointment'] = 'Дозволити співпадання інтервалів в різних курсах';//@TDMU
$string['multicoursesappointmentoverlap'] = 'Помилка! Ви не можете записатися на цей інтервал, оскільки уже записані на прийом в іншому курсі:';//@TDMU
$string['myappointments'] = 'Мої графіки прийомів';
$string['name'] = 'Ім\'я розкладу';
$string['needteachers'] = 'Інтервали не можуть бути додані - на курсі немає викладачів';
$string['negativerange'] = 'Період негативний. Цього неможе бути.';
$string['never'] = 'Ніколи';
$string['newappointment'] = '{$a} : Новий розклад прийому';
$string['noappointments'] = 'Немає розкладів прийому';
$string['noexistingstudents'] = 'Немає студентів';
$string['nogroups'] = 'Немає груп, доступних для складання розкладу.';
$string['noresults'] = 'Немає результатів. ';
$string['noschedulers'] = 'Немає розкладів';
$string['noslots'] = 'Немає наявних інтревалів для прийому.';
$string['noslotsavailable'] = 'Немає обов\'язкових розкадів прийому, чи всі оголошені розклади прийомів бли виконані.';
$string['noslotsopennow'] = 'Зараз немає відкритих інтревалів.';
$string['nostudents'] = 'Немає записаних на прийом студентів';
$string['nostudenttobook'] = 'Немає студента для запису';
$string['note'] = 'Оцінка';
$string['noteacherforslot'] = 'Немає викладача для інтревалів';
$string['noteachershere'] = 'Викладач відсутній';
$string['notifications'] = 'Повідомлення';
$string['notseen'] = 'Не був присутній';
$string['notselected'] = 'Ви не зробили вибору';
$string['now'] = 'Зараз';
$string['occurrences'] = 'Спостереження';
$string['on'] = 'на';
$string['oneslotadded'] = '1 інтервал додано';
$string['onthemorningofappointment'] = 'Вранці дня прийому';
$string['overall'] = 'Всюди';
$string['overlappings'] = 'Кілька інших інтервалів перекриваються';
$string['registeredlbl'] = 'Прийнятий студент';
$string['reminder'] = 'Нагадування';
$string['remindertext'] = 'Це нагадування вказує, що Ви не налаштували Ваш графік прийому. Будь-ласка, якщо можливо, виберіть інтервал часу о ';
$string['remindtitle'] = '{$a}: Нагадування про запис на прийом';
$string['remindwhere'] = 'Прийом буде проводитися (розташування): ';
$string['remindwithwhom'] = 'Заплановано прийоми у ';
$string['resetslots'] = 'Видалити інтервали графіку прийому';
$string['resetappointments'] = 'Видалити записи на прийом та оцінки';
$string['return'] = 'Повернутися до курсу';
$string['reuse'] = 'Повторне використання цього інтервалу';
$string['reuseguardtime'] = 'Охоронний інтервал для повторного використання';
$string['revoke'] = 'Анулювати графік прийому';
$string['saturday'] = 'Субота';
$string['save'] = 'Зберегти';
$string['savechoice'] = 'Зберегти мій вибір';
$string['savecomment'] = 'Зберегти примітку';
$string['saveseen'] = 'Був присутній';
$string['schedule'] = 'Розклад';
$string['scheduleappointment'] = 'Запланувати прийом для {$a}';
$string['schedulecancelled'] = '{$a} : Ваш прийом відмінено чи перенесено';
$string['schedulegroups'] = 'Розклад по групі';
$string['scheduleinnew'] = 'Записати в новий інтервал';
$string['scheduler'] = 'Розклад';
$string['schedulestudents'] = 'Розклад по студенту';
$string['showemailplain'] = 'Показувати e-mail адресу як звичайний текст';
$string['showemailplain_desc'] = 'В інтерфейсі керування розкладом для викладча показувати e-mail адреси студентів, що потребують запису на прийом ще і звичайним текстом, на додачу до mailto: посилання.';
$string['seen'] = 'Присутність';
$string['setreused'] = 'Використовувати повторно';
$string['setunreused'] = 'Повторно не використовувати';
$string['slot_is_just_in_use'] = 'Вибачте, прийом щойно був вибраний іншим студентом!<br>Спробуйте ще раз.';
$string['slotdescription'] = '{$a->status} на {$a->startdate} від {$a->starttime} до {$a->endtime} у {$a->location} з {$a->facilitator}.';
$string['slots'] = 'Інтервали';
$string['slotsadded'] = '{$a} інтервали були додані';
$string['slottype'] = 'Тип інтервалу';
$string['slotupdated'] = '1 інтервал було оновлено';
$string['slotwarning'] = '<strong>Увага: </strong>Переміщення цього інтервалу на вибраний час конфліктує з інтервалом(ами), що перераховані нижче. Увімкніть опцію "Не брати до уваги перекривання розкладів" якщо ви все ще хочете перемістити цей інтервал.';
$string['staffbreakdown'] = 'Ким: {$a}';
$string['staffmember'] = 'Професорсько-викладацький склад';
$string['staffrolename'] = 'Назва ролі відповідального за реєстрацію';
$string['start'] = 'Початок';
$string['startpast'] = 'Ви не можете розпочати інтервал прийому в минулому';
$string['starttime'] = 'Час початку';
$string['statistics'] = 'Статистика';
$string['strdownloadcsvgrades'] = 'Експорт оцінок в CVS';
$string['strdownloadcsvslots'] = 'Експорт інтервалів в CVS';
$string['strdownloadexcelsingle'] = 'Експорт в Excel як один лист';
$string['strdownloadexcelteachers'] = 'В Excel експортував {$a}';
$string['strdownloadodssingle'] = 'Експорт в OpenDoc як один лист';
$string['strdownloadodsteachers'] = 'В OpenDoc експортував {$a}';
$string['student'] = 'Студент';
$string['studentbreakdown'] = 'Студентом';
$string['studentcomments'] = 'Примітки для студентів';
$string['studentdetails'] = 'Детальна інформація по студенту';
$string['studentmultiselect'] = 'Кожен студент може бути вибраний лише раз в цьому інтервалі';
$string['studentnotes'] = 'Ваші примітки про графік прийому ';
$string['students'] = 'Студенти';
$string['sunday'] = 'Неділя';
$string['tab-thisappointment'] = 'Цей запис';
$string['tab-otherappointments'] = 'Всі записи цього студента';
$string['tab-otherstudents'] = 'Студенти в цьому інтервалі';
$string['teacher'] = 'Викладач';
$string['thursday'] = 'Четвер';
$string['tuesday'] = 'Вівторок';
$string['unattended'] = 'Незаписані';
$string['unlimited'] = 'Без обмежень';
$string['unregisteredlbl'] = 'Студенти без графіків прийому';
$string['updategrades'] = 'Оновити оцінки';
$string['updatesingleslot'] = '';
$string['updatingappointment'] = 'Оновити інформацію про зустріч';
$string['wednesday'] = 'Середа';
$string['welcomebackstudent'] = 'Виділений <a href="#select"><strong>жирним шрифтом</strong></a> рядок в таблиці нижче вказує на вибраний Вами час прийому. Ви можете змінити його на будь-який інший наявний інтервал.';
$string['welcomenewstudent'] = 'Таблиця нижче показує всі наявні інтервали для графіку прийому. Виберіть бажаний, поставивши відмітку перемикачем і не забудьте клацнути на кнопці "Зберегти мій вибір" після цього. Якщо пізніше Ви захочете внести змінити - зайдіть на цю сторінку ще раз.';
$string['welcomenewteacher'] = 'Будь-ласка, натисніть кнопку нижче щоб добавити записи про зустріч для показу всім студентам.';
$string['what'] = 'Що?';
$string['whathappened'] = 'Що відбулося?';
$string['whatresulted'] = 'Результат?';
$string['when'] = 'Коли?';
$string['where'] = 'Де?';
$string['who'] = 'З ким?';
$string['whosthere'] = 'Хто тут?';
$string['xdaysbefore'] = '{$a} дні до інтервалу';
$string['xweeksbefore'] = '{$a} тижні до інтервалу';
$string['yourappointmentnote'] = 'Примітки для Вас';
$string['yourslotnotes'] = 'Примітки до зустрічі';


/* ***********  Help strings from here on ************ */

$string['forcewhenoverlap_help']='
<h3>Примусове добавлення інтревалів при перекриванні</h3>
<p>Ця опція дозволяє примусово добавити інтервал(и) часу прийому, навіть, якщо в процесі добавлення нового(их) інтервалу(ів) виявлено їх перекривання (конфлікт) з існуючим(и) інтервалом(и). Якщо опція увімкнена, лише "чисті" (без конфліктів) інтервали будуть додані.</p>

<p>
Якщо опція вимкнена, процедура добавлення інтервалу(ів) при виявленні їх перекривання (конфлікт) буде перервана, і Вам буде задано питання з пропозцією видалити попередні(й) інтревал(и), щоб стало можливим добвити новий(і).
</p>';

$string['addscheduled_help']='
<h3>Реєстрація на прийом безпосередньо при налаштуванні часового інтервалу</h3>
<p>Використовуючи це посилання, ви можете зареєструвати користувача в цьому часовому інтервалі даного графіка прийому. Це простий та швидкий спосіб налаштувати прийому для групи. </p>';

$string['appointmentmode'] = 'Налаштування режиму розкладу прийому';
$string['appointmentmode_help']='<p>Ви можете вибрати такі варіанти здійснення запису на прийом. </p>
<p><ul>
<li><strong>"<emph>n</emph> записів в цьому розкладі":</strong> Студент може зареєструвати задане число записів даного виду діяльності. Навіть після зустрічі з викладачем (відмітка "Був присутній") студент не зможе запланувати жодної наступної зустрічі. Єдиний спосіб надати студенту можливість знову записуватися на прийом - видалити старі записи про здійснені зустрічі (з відмітками "Був присутній").</li>
<li><strong>"<emph>n</emph> записів на прийом за один раз":</strong> Студент може зареєструвати задане число записів даного виду діяльності. По закінченню часу зустрічі (якщо викладач поставив відмітку "Був присутній"), він зможе записатися знову. Однак для студента діє обмеження на загальну кількість <emph>n</emph> "відкритих" записів (включно з пропущеними).
</li>
</ul>
</p>';

$string['appointagroup_help'] = 'Виберіть, чи Ви хочете записатися на прийом самі, чи хочете записати всіх одногрупників також.';

$string['bookwithteacher_help']='Виберіть викладача, відповідального за проведення прийому.';

$string['choosingslotstart_help']='Змініть (чи встановіть новий) час початку прийому (зустрчі). Якщо даний графік прийому буде перекривати інші інтервали, вам буде задано питання про заміну всіх попередніх інтервалів, з якими виявлено конфлікти. Пам\'ятайте, що налаштування нового інтервалу будуть мати пріоритет над попередніми налаштуваннями.';

$string['exclusivity_help']='<p>Ви можете встановити граничне число студентів, що можуть записатися на окремий інтервал. </p>
<p>Встановленя обмеження в 1 перемкає даний інтервал в режим персональної зустрічі.</p>
<p>Якщо для інтервалу дозволено записувати необмежену кількість студентів, він не буде враховуватися в умовах обмеженя окрім випадків, коли інші інтервали також є персональними зустрічами чи потрапяють в той же відрізок часу.
</p>';

$string['location_help']='Вкажіть тут інформацію про місце, де буде здійснюватися прийом (проводитися зустріч).';

$string['notifications_help']='Якщо увімкнути цю опцію, вкладачі та студенти стануть отримувати повідомлення про нові записи/зміни/анулювання в графіках прийому.';

$string['multicoursesappointment'] = 'Налаштування режиму співпадання інтервалів в різних курсах';
$string['multicoursesappointment_help']='
<p>Ви можете змінювати режим обробки конфліктів, що виникають при співпадання інтервалів в різних курсах:</p>
<p><ul>
<li><strong>"Ні" - по замовчуванню:</strong> Інтервали прийому не можуть перекриватися для жодного з курсів, що їх веде даний викладач. 
</li>
<li><strong>"Так":</strong> Викладач може створювати в різних курсах розклади прийомів, часові інтервали яких перекриваються. Даний режим придатний для планування, наприклад, відробок практичних занять, у випадку, якщо один викладач веде кілька курсів. <strong>Примітка.</strong> Перекрити в часі інтервал, що помічений як персональна зустріч (з одним студентом) можна лише для кожного окремого інтервалу увімкнувши опцію "Не брати до уваги перекривання розкладів". 
</li>
</ul>
</p>';

$string['reuse_help']='
<em>"Так" - "Використовувати повторно":</em> Інтервал буде залишатися в розкладі доки студент чи викладач не відмінять даного розкладу прийому вцілому. Звільнений інтервал буде знову доступний для запису.</p>

<p><em>"Ні" - "Повторно не використовувати":</em> Інтервал буде автоматично видалений при досягненні моменту закінчення відповідної дати (однак, передбачається, що Ви не примушуєте до закриття "просто зараз"). Охоронна затримка може бути встановлена за допомгою параметру "Охоронна затримка для повторного використання".
</p>';

$string['reuseguardtime_help']='
<p>Цей параметер задає тривалість охоронної затримки для інтервалів, які відмічені як "Повторно не використовувати".</p>
<p>Якщо інтервал помічений як "повторно не використовувати", він буде автоматично видалений, щойно студент змінить запис на прийом, використає його, чи викладач скасує всі заплановані прийоми в цьому інтервалі. Видалення також має місце, якщо час початку дії такого інтервалу занадто близько до поточного часу (чи співпадаєз ним).</p>
<p>Цей параметер визначає затримку, починаючи "від цього моменту", після якої вільний інтервал буде видалений і стане недоступним для заису на прийом.</p>';

$string['staffrolename_help']='
Текстова мітка для ролі з правами реєстрації студентів на прийом. Може містити будь-яке значення, не обов\'язково "викладач".';


/* ***********  E-mail templates from here on ************ */

$string['email_applied_subject'] = '{$a->course_short}: Новий запис на прийом';
$string['email_applied_plain'] = 'Запис на прийом був проведений на {$a->date} о {$a->time}, 
студентом {$a->attendee} на курсі:

{$a->course_short}: {$a->course}

з використання модулю розкладу під назвою "{$a->module}" на сайті: {$a->site}.';

$string['email_applied_html'] = '<p>Запис на прийом був проведений на {$a->date} о {$a->time},<br/>
студентом <a href="{$a->attendee_url}">{$a->attendee}</a> на курсі:

<p>{$a->course_short}: <a href="{$a->course_url}">{$a->course}</a></p>

<p>з використання модулю розкладу під назвою "<em>{$a->module}</em>" на сайті: <a href="{$a->site_url}">{$a->site}</a>.</p>';

$string['email_cancelled_subject'] = '{$a->course_short}: Запис на прийом відмінено чи переміщено студентом';

$string['email_cancelled_plain'] = 'Ваш запис на прийом на  {$a->date} о {$a->time}, 
з студентом {$a->attendee} на курсі:

{$a->course_short} : {$a->course}

в модулі розкладу під назвою "{$a->module}" на сайті: {$a->site}

був відмінений чи перенесений.';

$string['email_cancelled_html'] = '<p>Ваш запис на прийом на <strong>{$a->date}</strong> о <strong>{$a->time}</strong>,<br/> 
з студентом <strong><a href="{$a->attendee_url}">{$a->attendee}</a></strong> на курсі:</p>

<p><strong>{$a->course_short} : <a href="{$a->course_url}">{$a->course}</a></strong></p>

<p>в модулі розкладу під назвою "<em>{$a->module}</em>" на сайті: <strong><a href="{$a->site_url}">{$a->site}</a></strong></p>

<p><strong><span style="color: red">був відмінений чи перенесений</span></strong>.</p>';

$string['email_reminder_subject'] = '{$a->course_short}: Нагадування про запис на прийом';

$string['email_reminder_plain'] = 'Наближається час Вашого запису на прийом 
на {$a->date} від {$a->time} до {$a->endtime}
з {$a->attendant}.

Розміщення: {$a->location}';

$string['email_reminder_html'] = '<p>Наближається час Вашого запису на прийом на <strong>{$a->date}</strong> 
від <strong>{$a->time}</strong> до <strong>{$a->endtime}</strong><br/> 
з <strong><a href="{$a->attendant_url}">{$a->attendant}</a></strong>.</p>

<p>Розміщення: <strong>{$a->location}</strong></p>';

$string['email_teachercancelled_subject'] = '{$a->course_short}: Запис на прийом відмінено викладачем';

$string['email_teachercancelled_plain'] = 'Ваш запис на прийом на {$a->date} о {$a->time}, 
з {$a->staffrole} {$a->attendant} на курсі:

{$a->course_short}: {$a->course}

в модулі розкладу під назвою "{$a->module}" на сайті: {$a->site}

було відмнено. Будь-ласка, пошукайте інший інтервал.';

$string['email_teachercancelled_html'] = '<p>Ваш запис на прийом на <strong>{$a->date}</strong> о <strong>{$a->time} </strong>,<br/> 
з {$a->staffrole} <strong><a href="{$a->attendant_url}">{$a->attendant}</a></strong> на курсі:</p>

<p><strong>{$a->course_short}: <a href="{$a->course_url}">{$a->course}</a></strong></p>

<p>в модулі розкладу під назвою "<em>{$a->module}</em>" на сайті: <strong><a href="{$a->site_url}">{$a->site}</a></strong></p>

<p><strong><span style="color : red">було відмнено</span></strong>. Будь-ласка, пошукайте інший інтервал.</p>';
