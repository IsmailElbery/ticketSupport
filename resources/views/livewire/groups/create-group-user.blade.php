<div class="max-w-xl">
    <div class="mb-5 text-2xl font-bold">اضافة مستخدم</div>
    <form wire:submit="addUserToGroup" class="space-y-5">
        <div>
            <select wire:model="userId" class="rounded-lg border border-gray-200 bg-gray-50 px-5 py-2.5 text-center text-sm font-medium text-gray-500 shadow-sm transition-all focus:ring focus:ring-gray-200">
                <option value="" disabled selected>اختر مستخدم</option>
                @foreach ($users as $user)
                <option  value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user') <span class="text-red-500">{{ $message }}</span> @enderror

        </div>
        <button type="submit"
            class="rounded-lg border border-green-500 bg-green-500 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-green-700 hover:bg-green-700 focus:ring focus:ring-green-200 disabled:cursor-not-allowed disabled:border-green-300 disabled:bg-green-300">
            اضافة
        </button>
    </form>
</div>
