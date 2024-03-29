<div>
    <x-status />
    <div class="mb-5 text-2xl font-bold">معلومات السجل</div>
    <div class="rounded-lg border border-gray-200 bg-white shadow-md">
        <div class="grid grid-cols-6 gap-6 p-4">
            <div class="font-bold">عنوان التذكرة</div>
            <div class="col-span-5">
                {{ ucfirst($log->subject->title) }}
            </div>
            <div class="font-bold">وصف التذكرة</div>
            <div class="col-span-5">
                {{ ucfirst($log->description) }}
            </div>
            <div class="font-bold">أنشئ بواسطة</div>
            <div class="col-span-5">
                {{ $log->causer?->name }}
            </div>
            <div class="font-bold">أنشئت منذ</div>
            <div class="col-span-5">
                {{ $log->created_at->diffForHumans() }}
            </div>
            <hr class="col-span-full">
            <div class="font-bold">صفات :</div>
            <pre class="col-span-5 overflow-auto">{{ json_encode(json_decode($log->changes, true), JSON_PRETTY_PRINT) }}</pre>
        </div>
    </div>
</div>
