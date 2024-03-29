<div class="max-w-xl">
    <div class="mb-5 text-2xl font-bold">اضافة تذكرة</div>
    <form wire:submit="save" class="space-y-5">
        <div>
            <label for="title"
                class="mb-1 block text-sm font-medium text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">عنوان التذكرة</label>
            <input type="text" id="title" wire:model="form.title" @class([
                'block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50',
                'border-red-300 focus:border-red-300 focus:ring-red-200' => $errors->has(
                    'form.title'),
            ]) placeholder="عنوان التذكرة" />
            @error('form.title')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="priority"
                class="mb-1 block text-sm font-medium text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">الأولوية</label>
            <select wire:model.live="form.priority"
                class="focus:border-primary-300 focus:ring-primary-200 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50">
                <option value="low">منخفضة</option>
                <option value="medium">متوسطة</option>
                <option value="high">حرجة</option>
            </select>
        </div>
        <div>
            <label for="description"
                class="mb-1 block text-sm font-medium text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">وصف التذكرة</label>
            <textarea type="description" id="description" wire:model="form.description" rows="5" @class([
                'block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50',
                'border-red-300 focus:border-red-300 focus:ring-red-200' => $errors->has(
                    'form.description'),
            ])
                placeholder="صف المشكلة..."></textarea>
            @error('form.description')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="categories" class="mb-1 block text-sm font-medium text-gray-700">الفئة</label>
            <div class="flex space-x-6">
                @foreach ($categories as $category)
                    <label class="flex items-center space-x-2 text-sm font-medium text-gray-700">
                        <input type="checkbox" value="{{ $category->id }}" wire:model="form.selectedCategories"
                            class="text-primary-600 focus:border-primary-300 focus:ring-primary-200 h-4 w-4 rounded border-gray-300 shadow-sm focus:ring focus:ring-opacity-50 focus:ring-offset-0 disabled:cursor-not-allowed disabled:text-gray-400" />
                        <span>{{ $category->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>
        <div>
            <label for="labels" class="mb-1 block text-sm font-medium text-gray-700">الوسم</label>
            <div class="flex space-x-6">
                @foreach ($labels as $label)
                    <label class="flex items-center space-x-2 text-sm font-medium text-gray-700">
                        <input type="checkbox" value="{{ $label->id }}" wire:model="form.selectedLabels"
                            class="text-primary-600 focus:border-primary-300 focus:ring-primary-200 h-4 w-4 rounded border-gray-300 shadow-sm focus:ring focus:ring-opacity-50 focus:ring-offset-0 disabled:cursor-not-allowed disabled:text-gray-400" />
                        <span>{{ $label->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>
        <div>
            <label for="attachments" class="mb-1 block text-sm font-medium text-gray-700">الملفات</label>
            <input id="attachments" wire:model="form.attachments" multiple type="file"
                class="block w-full text-sm file:mr-4 file:rounded-md file:border-0 file:bg-blue-500 file:px-4 file:py-2.5 file:text-sm file:font-semibold file:text-white hover:file:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-60" />
            @error('form.attachments.*')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit"
            class="rounded-lg border border-green-500 bg-green-500 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-green-700 hover:bg-green-700 focus:ring focus:ring-green-200 disabled:cursor-not-allowed disabled:border-green-300 disabled:bg-green-300">
            اضافة
        </button>
    </form>
</div>
