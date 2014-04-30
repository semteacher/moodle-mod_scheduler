﻿<?php
$string['pluginname'] = 'Расписание';
$string['pluginadministration'] = 'Управление расписанием';
$string['modulename'] = 'Расписание';
$string['modulename_help'] = 'Модуль активности "Расписание" поможет Вам планировать встречи с Вашими студентами. 

Преподаватели оперделяют временные интервалы для встеч (приёмов), студенты выбирают их в Moodle.
Преподаватели могут отмечать присутствие студентов, результаты встречи (приёма) - и, опционально, выставлять оценки.

Поддерживается создание расписания для групп. Соответственно, в каждый интервал времени может записаться несколько студентов. Дополнительно, есть возможность запланировать расписание приёма для всей группы студентов одновременно.';
$string['modulename_link'] = 'mod/scheduler/view';
$string['modulenameplural'] = 'Расписания';

/* ***** Capabilities ****** */
$string['scheduler:addinstance'] = 'Добавить новое расписание';
$string['scheduler:appoint'] = 'Приём';
$string['scheduler:attend'] = 'Записанные студенты';
$string['scheduler:canscheduletootherteachers'] = 'Планировать график приёма для других преподавателей кафедры';
$string['scheduler:canseeotherteachersbooking'] = 'Просмативать регистрации других преподавателей';
$string['scheduler:disengage'] = 'Удалить все графики приёма (студенты)';
$string['scheduler:manage'] = 'Управлять Вашими временными интервалами и графиками приёма';
$string['scheduler:manageallappointments'] = 'Управлять всей информаций расписании';
$string['scheduler:seeotherstudentsbooking'] = 'Просмативать регистрации других студентов на интервале';
$string['scheduler:seeotherstudentsresults'] = 'Просмативать результати других студентов на интервале';

/* ***** Interface strings ****** */

$string['onedaybefore'] = '1 день перед интервалом';
$string['oneweekbefore'] = '1 неделя до интервала';
$string['action'] = 'Действие';
$string['addappointment'] = 'Добавить другово студента';
$string['addondays'] = 'Добавить графики приёма на';
$string['addscheduled'] = 'Добавить студента в расписание';
$string['addaperiodsession'] = 'Добавить интервалы - свободно';//@TDMU
$string['addsession'] = 'Добавить интервалы - еженедельно';//@TDMU renamed
$string['addsingleslot'] = 'Добавить один интервал';
$string['addslot'] = 'Вы можете в любой момент создать дополнительные интервалы приёма.';
$string['addstudenttogroup'] = 'Добавить этого студента к группе в расписании';
$string['allappointments'] = 'Все графики приёмов';
$string['allowgroup'] = 'Ограниченный интервал - щёлкните для изменения';
$string['allslotsincloseddays'] = 'Все интервалы были в закрытых днях';
$string['allteachersgrading'] = 'Преподаватели могут выставлять оценки во всех графиках прёма';
$string['allteachersgrading_desc'] = 'Если включено, преподаватель сможет оценивать приёмы, к которым он не присоединён.';
$string['alreadyappointed'] = 'Запись на приём невозможна. Интервал времени полностью заполнен.';
$string['appointagroup'] = 'Приём для группы';
$string['appointfor'] = 'Приём для ';
$string['appointformygroup'] = 'Записать на приём всю мою групу';
$string['appointingstudent'] = 'График приёма, которій включает интервал';
$string['appointingstudentinnew'] = 'График приёма для нового интервала';
$string['appointmentno'] = 'Запись {$a}';
$string['appointmentnotes'] = 'Примечания к графику приёма';
$string['appointments'] = 'Графики приёмов';
$string['appointsolo'] = 'только я';
$string['appointsomeone'] = 'Добавить новій график приёма';
$string['attendable'] = 'Могут записаться';
$string['attendablelbl'] = 'Всего кандидатов для записи';
$string['attended'] = 'Записаны';
$string['attendedlbl'] = 'Количество записанных студентов';
$string['attendedslots'] = 'Интервалы с записями';
$string['availableslots'] = 'Доступные интервалы';
$string['availableslotsall'] = 'Всего интервалов';
$string['availableslotsnotowned'] = 'Не мои';
$string['availableslotsowned'] = 'Мои';
$string['bookwithteacher'] = 'Зарегистрировал';
$string['cancelledbystudent'] = '{$a} : Приём отменён или перемещен студентом';
$string['cancelledbyteacher'] = '{$a} : Приём отменён преподавателем';
$string['choice'] = 'Выбор';
$string['chooseexisting'] = 'Виберите существующий';
$string['choosingslotstart'] = 'Виберите время начала';
$string['comments'] = 'Примечания';
$string['complete'] = 'Отмечено';
$string['composeemail'] = 'Напишите email:';
$string['confirmdelete'] = 'Полное удаленине. Продолжать ?';
$string['conflictingslots'] = 'Конфликты';
$string['course'] = 'Курс';
$string['csvencoding'] = 'Кодировка текстового файла';
$string['csvfieldseparator'] = 'Разделитель полей для csv';
$string['csvparms'] = 'Параметры файлу csv';
$string['csvrecordseparator'] = 'Разделитель записей для csv';
$string['cumulatedduration'] = 'Сумарная продолжительноть приёмов';
$string['date'] = 'Дата';
$string['datelist'] = 'Обзор';
$string['defaultslotduration'] = 'Продлжительность интервала по-умолчанию';
$string['defaultslotduration_help'] = 'Продлжительность по-умолчанию (в минутах) для интервала графика приёма, который Вы настраиваете';
$string['deleteallslots'] = '- все интервалы';
$string['deleteallunusedslots'] = '- все незадействованные интервалы';
$string['deletemyslots'] = '- все мои интервалы';
$string['deleteselection'] = 'Удалить отмеченные интервалы';
$string['deletetheseslots'] = 'Удалить эти интервалы';
$string['deleteunusedslots'] = '- мои незадействованные интервалы';
$string['department'] = 'Откуда?';
$string['disengage'] = 'Удалить мои графики приёма';
$string['displayfrom'] = 'Показать график приёма студентам начиная от';
$string['distributetoslot'] = 'Распостранить на всю группу';
$string['divide'] = 'Делить на интервалы?';
$string['dontforgetsaveadvice'] = 'Вы изменили перечеь записанных на приём персон. Незабудьте сохренить изменения в этой форме для подтверждения.';
$string['downloadexcel'] = 'Экспортировать в Excel';
$string['downloads'] = 'Экспорт';
$string['duration'] = 'Продолжительность';
$string['durationrange'] = 'Продолжительность интервала приёма должна быть от {$a->min} до {$a->max} мин.';
$string['emailreminder'] = 'Отправить напоминание по email';
$string['end'] = 'Окончание';
$string['enddate'] = 'Повторить интервал до';
$string['endtime'] = 'Время окончания';
$string['exclusive'] = 'Персональный';
$string['exclusivity'] = 'Персонально';
$string['exclusivitylockedto'] = 'Вы не можете изменить режим интервала при составлении расписания. Текущий лимит интервалов назначения будет использован. Если это новый интервал, лимит по-умолчанию в 1 будет использован.';
$string['exclusivityoverload'] = 'В интервал записаны {$a} студентов, что больше, чем позволяет этот параметр.';
$string['explaingeneralconfig'] = 'Эта настройка может быть установлена только на уровне сайта и будет задействована для всех расписаний в этом Moodle.';
$string['exportinstructions'] = 'Лучше всего - перед началом использования файла экспорта, сохраните его на диске вашего компьютера.';
$string['finalgrade'] = 'Окончательна оценка';
$string['firstslotavailable'] = 'Первый интервал будет открыт в: ';
$string['for'] = 'для';
$string['forbidgroup'] = 'Групповий интервал - щёлкните для изменения';
$string['forcewhenoverlap'] = 'Принудительно перекрывать';
$string['forcourses'] = 'Виберите студентов на курсе';
$string['friday'] = 'Пятница';
$string['generalconfig'] = 'Общие настройки';
$string['getstudentsnotes'] = 'Следует указать основания для записи на приём:'; //@TDMU
$string['getstudentsnoteserr'] = '<strong>Примечания обязательны!</strong> Изменения не будут сохранены. Попробуйте еще раз!'; //@TDMU
$string['gradingstrategy'] = 'Методика оценивания';
$string['gradingstrategy_help'] = 'Для расписаний в которых студенты могут иметь несколько записей, выберите, как оценка будет окончательной. '.
    'В журнале оценок может отображаться или <ul><li>средняя оценка или</li><li>максимальная оценка</li></ul> полученная студентом.';
$string['group'] = 'группа ';
$string['groupbreakdown'] = 'По размеру группы';
$string['groupscheduling'] = 'Включить заспись на приём группами';
$string['groupscheduling_desc'] = 'Позволяет записывать на приём всех членов группы одновременно. ' .
         '(Независимо от глобальных настроек, чтобы включить эту функциональность, групповой режим для даного вида активности должен быть установлен в  "Показывать группы" или "Изолированные группы".)';
$string['groupsession'] = 'Сессия для группы';
$string['groupsize'] = 'Размер группы';
$string['guestscantdoanything'] = 'Гости не могут здесь ничего изменять.';
$string['howtoaddstudents'] = 'Используйте настройку ролей модуля чтобы добавить студентов в расписание на глобальном уровне.<br/>Вы также можете использовать настройку ролей в модуле для того, чтобы назначить персон-регистраторов для ваших студентов.';
$string['ignoreconflicts'] = 'Не учитывать перекрытие рассписаний';
$string['ignoreconflicts_help'] = 'Если эта опция включена, то интервал приёма будет установлен на указанную дату и время, даже если существуют другие интервалы приёма, с которыми происходит перекрытие. Это может привести к перекрытию графиков приёмов для преподавателей и студентов, поэтому, используйте эту опцию осторожно.';
$string['incourse'] = ' в курсе ';
$string['introduction'] = 'Вступление';
$string['invitation'] = 'Приглашение';
$string['invitationtext'] = 'Пожалуйста, виберите временной интервал для расписания приёма в ';
$string['isnonexclusive'] = 'Не персональный';
$string['lengthbreakdown'] = 'По продолжительности интервала';
$string['limited'] = 'Ограничено ({$a} осталось)';
$string['location'] = 'Размещение';
$string['markseen'] = 'пожалуйста после встречи со студентом сделайте отметку "Присутствовал", установив соотстветствующий переключатель и нажав ссылку в таблице выше.';
$string['markasseennow'] = 'Отметить как присутствующего сейчас';
$string['maxgrade'] = 'Взять наивысшую оценку';
$string['maxstudentsperslot'] = 'Максимальное количество студентов на интервале приёма';
$string['maxstudentsperslot_desc'] = 'Интервалы группового приёма / не-персональные интервалы приёма могут иметь не боле этого количества студентов. Примечание: дополнительно, значение "неограниченно" всегда может быть установлено для интервала приёма.';
$string['maxstudentlistsize'] = 'Максимальная длинна списка студентів';
$string['maxstudentlistsize_desc'] = 'Максимальная длинна списка студентов, для которых требуется расписание приёма, который будет отображаться в панели преподавателя. Если студентов больше, список не будет отображаться.';
$string['meangrade'] = 'Взять оценку по среднему';
$string['meetingwith'] = 'Встреча с вами';
$string['meetingwithplural'] = 'Встреча с вами';
$string['mins'] = 'минут';
$string['minutes'] = 'минут';
$string['minutesperslot'] = 'минут на интервал';
$string['missingstudents'] = '{$a} студентов все еще требуют асписания приёма';
$string['mode'] = 'Режим';
$string['modulename'] = 'Расписание';
$string['modulenameplural'] = 'Расписания';
$string['monday'] = 'Понедельник';
$string['move'] = 'Изменить';
$string['moveslot'] = 'Переместить интервал';
$string['multiplestudents'] = 'Разрешить множество студентов в интервале?';
$string['multicoursesteacherappointment'] = 'Разрешить совпадения интервалов в разных курсах';//@TDMU
$string['multicoursesappointmentoverlap'] = '<strong>Ошибка!</strong> Вы не можете записаться на этот интервал, поскільку уже записаны на приём в другом курсе:';//@TDMU
$string['myappointments'] = 'Мои графики приёмов';
$string['mynote'] = 'Mои примечания';// @TDMU
$string['name'] = 'Имя расписания';
$string['needteachers'] = 'Интервалы не могут бути добавлены - на курсе отсутствуют преподаватели';
$string['negativerange'] = 'Период негативный. Этого неможет быть.';
$string['never'] = 'Никогда';
$string['newappointment'] = '{$a} : Новое расписания приёма';
$string['noappointments'] = 'Нет расписаний приёмов';
$string['noexistingstudents'] = 'Нет студентов';
$string['nogroups'] = 'Нет групп, доступных для соствления расписания.';
$string['noresults'] = 'Нет результатов. ';
$string['noschedulers'] = 'Нет расписаний';
$string['noslots'] = 'Нет в наличии интревалов для приёма.';
$string['noslotsavailable'] = 'Нет обязательных расписаний приёмов, или все анонсированные расписания приёмов были выполнены.';
$string['noslotsopennow'] = 'Сейчас нет открытых интревалов.';
$string['nostudents'] = 'Нет записанных на прийом студентов';
$string['nostudenttobook'] = 'Нет студента для записи';
$string['note'] = 'Оценка';
$string['noteacherforslot'] = 'Нет преподавателя для интревалов';
$string['noteachershere'] = 'Преподаватель отсутствует';
$string['notes'] = 'Примечания';
$string['notifications'] = 'Сообщения';
$string['notselected'] = 'Вы не сделали выбора';
$string['now'] = 'Сейчас';
$string['occurrences'] = 'Наблюдения';
$string['on'] = 'на';
$string['oneappointmentonly'] = 'Студенты могут регистрировать только одну запись на приём';
$string['oneatatime'] = 'Студенты могут регистрировать только одну запись на приём за один раз';
$string['oneslotadded'] = '1 интервал добавлен';
$string['onthemorningofappointment'] = 'Утром в день приёма';
$string['overall'] = 'Везде';
$string['overlappings'] = 'Несколько других интервалов перекрываются';
$string['registeredlbl'] = 'Принятый студент';
$string['reminder'] = 'Напоминание';
$string['remindertext'] = 'Это напоминание указывает, что Вы не настроили Ваш график приёма. Пожалуйста, если возможно, виберите интервал времени в ';
$string['remindtitle'] = '{$a}: Напоминание о записи на приём';
$string['remindwhere'] = 'Приём будет проводиться (размещение): ';
$string['remindwithwhom'] = 'Запланированны приёмы в ';
$string['resetslots'] = 'Удалить интервалы графика приёма';
$string['resetappointments'] = 'Удалить записи на приём и оценки';
$string['return'] = 'Вернуться к курсу';
$string['reuse'] = 'Повторное использование этого интервала';
$string['reuseguardtime'] = 'Защитный интервал для повторного использования';
$string['revoke'] = 'Анулиовать график приёма';
$string['saturday'] = 'Суббота';
$string['save'] = 'Сохранить';
$string['savechoice'] = 'Сохранить мой выбор';
$string['savecomment'] = 'Сохранить примечание';
$string['saveseen'] = 'Присутстовал';
$string['schedule'] = 'Расписание';
$string['scheduleappointment'] = 'Запланировать приём для {$a}';
$string['schedulecancelled'] = '{$a} : Ваш приём отменён или перенесён';
$string['schedulegroups'] = 'Расписание по группе';
$string['scheduler'] = 'Расписание';
$string['schedulestudents'] = 'Расписание по студенту';
$string['showemailplain'] = 'Показывать e-mail адрес как обычный текст';
$string['showemailplain_desc'] = 'В интерфейсе управления расписанием для преподавателя, '.
    'показывать e-mail адреса студентов, для которых требуется запись на приём ещё и обычным текстом, в дополнение к mailto: ссылкам.';
$string['seen'] = 'Присутствие';
$string['setreused'] = 'Использовать повторно';
$string['setunreused'] = 'Повторно не использовать';
$string['slot_is_just_in_use'] = 'Извините, приём только что был выбран другим студентом!<br>Попробуйте еще раз.';
$string['slots'] = 'Интервалы';
$string['slotsadded'] = '{$a} интервалы были добавлены';
$string['slottype'] = 'Тип интервала';
$string['slotupdated'] = '1 интервал был обновлён';
$string['slotwarning'] = '<strong>Внимание: </strong>Перемещение этого интервала на указанное время конфликтует с нижеперечисленными интервалом(ами). Включите опцию "Не учитывать перекрытие расписаний" если вы все ещё хотите переместить этот интервал.';
$string['staffbreakdown'] = 'Кем: {$a}';
$string['staffmember'] = 'Профессорско-преподавательский состав';
$string['staffrolename'] = 'Название роли ответственного за регистрацию';
$string['start'] = 'Начало';
$string['startpast'] = 'Вы не можете начать интервал приёма в прошлом';
$string['starttime'] = 'Время начала';
$string['statistics'] = 'Статистика';
$string['strdownloadcsvgrades'] = 'Экспорт оценок в CVS';
$string['strdownloadcsvslots'] = 'Экспорт интервалов в CVS';
$string['strdownloadexcelsingle'] = 'Экспорт в Excel как один лист';
$string['strdownloadexcelteachers'] = 'В Excel экспортировал {$a}';
$string['strdownloadodssingle'] = 'Экспорт в OpenDoc как один лист';
$string['strdownloadodsteachers'] = 'В OpenDoc экспортировал {$a}';
$string['student'] = 'Студент';
$string['studentbreakdown'] = 'Студентом';
$string['studentcomments'] = 'Примечания для студентов';
$string['studentdetails'] = 'Детальная информация по студенту';
$string['studentnotes'] = 'Ваши прмечания о графике приёма ';
$string['studentnotesrequiredopt'] = 'Требовать от студента ввода примечание для записи на приём';//@TDMU
$string['students'] = 'Студенты';
$string['sunday'] = 'Воскресенье';
$string['teacher'] = 'Преподаватель';
$string['teachernote'] = 'Примечания преподавателя'; //@TDMU
$string['thursday'] = 'Четверг';
$string['tuesday'] = 'Вторник';
$string['unattended'] = 'Незаписанные';
$string['unlimited'] = 'Без оганичений';
$string['unregisteredlbl'] = 'Студенты без графиков приёма';
$string['updategrades'] = 'Оновить оценки';
$string['updatesingleslot'] = '';
$string['updatingappointment'] = 'Обновить информацию о встече';
$string['wednesday'] = 'Среда';
$string['welcomebackstudent'] = 'Выделенная жирным шрифтом строка в таблице ниже указывает на выбранное Вами время приёма. Вы можете изменить его на любой другой наличествующий интервал.';
$string['welcomenewstudent'] = 'Таблица ниже показывет все наличествующие интервалы для графика приёма. Выберите желаемый, установив отметку переключателем и не забудьте нажать кнопку "сохранить мой выбор" после этого. Если позже Вы захочете внести изменения - зайдите на эту страницу еще раз.';
$string['welcomenewteacher'] = 'Пожалуйста, нажмите кнопку ниже чтобы добавить записи о встрече для показа всем студентам.';
$string['what'] = 'Что?';
$string['whathappened'] = 'Что произошло?';
$string['whatresulted'] = 'Результат?';
$string['when'] = 'Когда?';
$string['where'] = 'Где?';
$string['who'] = 'С кем?';
$string['whosthere'] = 'Кто здесь?';
$string['xdaysbefore'] = ' дня до интервала';
$string['xweeksbefore'] = ' недели до интервала';
$string['yourappointmentnote'] = 'Примечания для Вас';
$string['yourslotnotes'] = 'Примечания к встрече';


/* ***********  Help strings from here on ************ */

$string['forcewhenoverlap_help']='
<h3>Принудительное добавленине интревалов при перекрытии</h3>
<p>Эта опция позволяет принудительно добавить интервал(ы) времени приёма, даже, если в процессе добавления нового(ых) интервала(ов) выявлено их перекрытие (конфликт) с существующим(и) интервалом(ами). Если опция включена, только "чистые" (без конфликтов) интервалы будут добавленыю.</p>

<p>
Если опция выключена, процедура добавления интервала(ов), при выявленнии их перекрытия (конфликта) будет прервана, и Вам будет задан вопрос с предложением удалить предыдущий(е) интревал(ы), чтобы стало возможным добавить новый(е).
</p>';

$string['addscheduled_help']='
<h3>Регистрация на приём непосредственно при настройке временного интервала</h3>
<p>Используя эту ссылку, Вы можете зарегистрировать пользователя в этом временном интервале даного графика приёма. Это простой и быстрый способ настройки приёма для группы. </p>';

$string['appointmentmode'] = 'Настройка режима расписания прёма';
$string['appointmentmode_help']='<p>Вы можете выбрать такие варианты реализации записи на приём: </p>
<p><ul>
<li>><strong>"<emph>n</emph> записей в этом расписании":</strong> Студент может зарегистрировать заданное количество записей этого вида деятельности. Даже после встречи с преодавателем (отметка "Присутсвовал") студент не сможет запланировать ни одной следующей встречи. Единтвенный способ дать студенту возможность снова записываться на приём - удалить старые записи о проведенных встречах (с отметкой "Присутсвовал").</li>
<li><strong>"<emph>n</emph> записей на приём за один раз":</strong> Студент может зарегистрировать заданное количество записей этого вида деятельности. По окончании времени встречи (если преподаватель поставил отметку "Присутсвовал"), он сможет записатися снова. Для студента действует ограничение на общее количество <emph>n</emph> "открытых" записей (включая пропущенные). 
</li>
</ul>
</p>';

$string['appointagroup_help'] = 'Виберите, хотите ли Вы записаться на приём сами, или же хотите записать всех одногрупников также.';

$string['bookwithteacher_help']='Выберите преподавателя, ответственого за проведение прёма.';

$string['choosingslotstart_help']='Измените (или укажите новое) время начала приёма (встречи). Если данный график приёма будет перекривать другие интервалы, Вам будет задан вопрос о замене всех предыдущих интервалов, с которыми выявлены конфликты. Помните, что настройки нового интервала будут иметь приоритет над предыдущими настройками.';

$string['exclusivity_help']='<p>Вы можете установить максимальное число студентов, которые могут записаться на отдельный интервал. </p>
<p>Устновка ограничения в 1 переключает данный интервал в режим персональной встречи</p>
<p>Если для интервала разрешается записывать неограниченное количество студентов, он не будет учитываться в условиях ограничений кроме случаев, когда другие интервалы также являются персональными встречами или попадают в тот же отрезок вермени.
</p>';

$string['location_help']='Укажите здесь информацию о месте, где будет проходить приём (проводиться встреча).';

$string['multicoursesappointment'] = 'Настройка режима совпадения интервалов в различных курсах';
$string['multicoursesappointment_help']='
<p>Вы можете изменять режим обработки конфликтов, которые возникают при совпадения интервалов в различных курсах:</p>
<p><ul>
<li><strong>"Нет" - по умолчанию:</strong> Интервалы приёма не могут перекрываться ни для одного из курсов, которые проводит данный преподаватель. 
</li>
<li><strong>"Да":</strong> Преподаватель может создавать в разных курсах расписания приёмов, временные интервалы которых перекрываются. Данный режим может быть использован для планирования, например, отработок практических занятий, в случае, если один преподаватель ведет несколько курсов. <strong>Примечание.</strong> Перекрыть во времени интервал, отмеченный как персональная встреча (с одним студентом) можно только для каждого отдельного интервала включив опцию "Не учитывать перекрытие рассписаний". 
</li>
</ul>
</p>';

$string['notifications_help']='Если включить эту опцию, преподаватели и студенты будут получать сообщения о новых записях/изменениях/анулировании в графиках приёмов.';

$string['reuse_help']='
<em>"Да" - "Использовать повторно"</em> Интервал будет оставаться в расписании пока студент или преподаватель не отменят данное расписание приёма вцелом. Освобождённый интервал будет снова доступен для записи.</p>

<p><em>"Нет" - "Повторно не использовать"</em> Интервал будет автоматически удалён при достижении момента окончания соответствующей даты (однако, предвидится, что Вы не принуждаете к закрытию "прямо сейчас"). Охранная задержка может быть установлена с помощью параметра "Охранная задержка для повторного использования".
</p>';

$string['reuseguardtime_help']='
<p>Этот параметр задает продолжительность охранной задержки для интервалов, которые отмечены как "Повторно не использовать".</p>
<p>Если интервал отмечен как "повторно не использовать", он будет автоматически удалён, как только студент изменит запись на приём, использует его, или преподаватель отменит все запланированные приёмы в этом интервале. Удаление также имеет место, если время начала действия такого интервала слишком близко к текущему времени (или совпадает с ним).</p>
<p>Это параметр определяет задержку, начиная "от этого момента", после которой свободный интервал будет удалён, и станет недоступным для заиси на приём.</p>';

$string['staffrolename_help']='
Текстовая метка для роли с правами регистрации студентов на приём. Может включать любое значение, не обязательно "преподаватель".';

$string['studentnotesrequired']='Настройка режима требований для примечаний студнентов';// @TDMU
$string['studentnotesrequired_help']='
<p>Перподаватель может настроить режим требований для примечаний студнентов:</p>
<ul>
<li>
<strong>"Нет" - по умолчанию:</strong> Для записи на приём студенту нет необходимости в примечаниях.
</li>
<li>
<strong>"Да":</strong> Для записи на приём студент должен ввести примечания.
</li>
</ul>';

/* ***********  E-mail templates from here on ************ */

$string['email_applied_subject'] = '{$a->course_short}: Новая запись на приём';
$string['email_applied_plain'] = 'Запись на приём была произведена на {$a->date} в {$a->time}, 
студентом {$a->attendee} на курсе:

{$a->course_short}: {$a->course}

с использованием модуля расписания под названием "{$a->module}" на сайте: {$a->site}.';

$string['email_applied_html'] = '<p>Запись на приём была произведена на {$a->date} в {$a->time},<br/>
студентом <a href="{$a->attendee_url}">{$a->attendee}</a> на курсе:

<p>{$a->course_short}: <a href="{$a->course_url}">{$a->course}</a></p>

<p>с использованием модуля расписания под названием "<em>{$a->module}</em>" на сайте: <a href="{$a->site_url}">{$a->site}</a>.</p>';

$string['email_cancelled_subject'] = '{$a->course_short}: Запись на приём отменена или перемещена студентом';

$string['email_cancelled_plain'] = 'Ваша запись на приём на  {$a->date} в {$a->time}, 
со студентом {$a->attendee} на курсе:

{$a->course_short} : {$a->course}

в модуле расписания под названием "{$a->module}" на сайте: {$a->site}

была отменена или перенесена.';

$string['email_cancelled_html'] = '<p>Ваша запись на приём на <strong>{$a->date}</strong> в <strong>{$a->time}</strong>,<br/> 
со студентом <strong><a href="{$a->attendee_url}">{$a->attendee}</a></strong> на курсе:</p>

<p><strong>{$a->course_short} : <a href="{$a->course_url}">{$a->course}</a></strong></p>

<p>в модуле расписания под названием "<em>{$a->module}</em>" на сайте: <strong><a href="{$a->site_url}">{$a->site}</a></strong></p>

<p><strong><span style="color: red">была отменена или перенесена</span></strong>.</p>';

$string['email_reminder_subject'] = '{$a->course_short}: Напоминание о записи на приём';

$string['email_reminder_plain'] = 'Приближаетя время Вашей записи на приём 
на {$a->date} от {$a->time} до {$a->endtime}
с {$a->attendant}.

Размещение: {$a->location}';

$string['email_reminder_html'] = '<p>Приближаетя время Вашей записи на приём <strong>{$a->date}</strong> 
от <strong>{$a->time}</strong> до <strong>{$a->endtime}</strong><br/> 
с <strong><a href="{$a->attendant_url}">{$a->attendant}</a></strong>.</p>

<p>Размещение: <strong>{$a->location}</strong></p>';

$string['email_teachercancelled_subject'] = '{$a->course_short}: Запись на приём отменена преподавателем';

$string['email_teachercancelled_plain'] = 'Ваша запись на приём на {$a->date} в {$a->time}, 
з {$a->staffrole} {$a->attendant} на курсе:

{$a->course_short}: {$a->course}

в модуле расписания под названием "{$a->module}" на сайте: {$a->site}

была отменена. Пожалуйста, поищите другой интервал.';

$string['email_teachercancelled_html'] = '<p>Ваша запись на приём на <strong>{$a->date}</strong> в <strong>{$a->time} </strong>,<br/> 
з {$a->staffrole} <strong><a href="{$a->attendant_url}">{$a->attendant}</a></strong> на курсе:</p>

<p><strong>{$a->course_short}: <a href="{$a->course_url}">{$a->course}</a></strong></p>

<p>в модуле расписания под названием "<em>{$a->module}</em>" на сайте: <strong><a href="{$a->site_url}">{$a->site}</a></strong></p>

<p><strong><span style="color : red">была отменена</span></strong>. Пожалуйста, поищите другой интервал.</p>';
