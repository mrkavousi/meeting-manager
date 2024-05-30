<div class="form-group">
    <label for="title">عنوان</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $session->title ?? '') }}" required>
</div>
<div class="form-group">
    <label for="date">تاریخ</label>
    <input type="date" name="date" class="form-control" value="{{ old('date', $session->date ?? '') }}" required>
</div>
<div class="form-group">
    <label for="start_time">زمان شروع</label>
    <input type="time" name="start_time" class="form-control" value="{{ old('start_time', $session->start_time ?? '') }}" required>
</div>
<div class="form-group">
    <label for="end_time">زمان پایان</label>
    <input type="time" name="end_time" class="form-control" value="{{ old('end_time', $session->end_time ?? '') }}" required>
</div>
<div class="form-group">
    <label for="location">مکان</label>
    <input type="text" name="location" class="form-control" value="{{ old('location', $session->location ?? '') }}" required>
</div>
<div class="form-group">
    <label for="participants">شرکت‌کنندگان</label>
    <textarea name="participants" class="form-control" required>{{ old('participants', $session->participants ?? '') }}</textarea>
</div>
<div class="form-group">
    <label for="absentees">غایبان</label>
    <textarea name="absentees" class="form-control">{{ old('absentees', $session->absentees ?? '') }}</textarea>
</div>
<div class="form-group">
    <label for="agenda">دستور جلسه</label>
    <textarea name="agenda" class="form-control" required>{{ old('agenda', $session->agenda ?? '') }}</textarea>
</div>
<div class="form-group">
    <label for="summary">خلاصه</label>
    <textarea name="summary" class="form-control">{{ old('summary', $session->summary ?? '') }}</textarea>
</div>
<div class="form-group">
    <label for="actions">اقدامات</label>
    <textarea name="actions" class="form-control">{{ old('actions', $session->actions ?? '') }}</textarea>
</div>
<div class="form-group">
    <label for="follow_up_items">موارد پیگیری</label>
    <textarea name="follow_up_items" class="form-control">{{ old('follow_up_items', $session->follow_up_items ?? '') }}</textarea>
</div>
<div class="form-group">
    <label for="next_meeting">جلسه بعدی</label>
    <input type="text" name="next_meeting" class="form-control" value="{{ old('next_meeting', $session->next_meeting ?? '') }}">
</div>
