<div>
    <x-status />
    <div class="mb-5 text-2xl font-bold">المجموعات</div>
    <div class="max-w-2xl overflow-hidden rounded-lg border border-gray-200 shadow-md">
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500" style="text-align: center;">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-400">الإسم</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-400">الإجراءات</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @foreach ($groups as $group)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $group->name }}</td>
                        <td class="flex justify-end gap-4 px-6 py-4 font-medium">
                            <a href="{{ route('groups.edit', $group) }}"
                                class="rounded-full bg-blue-400 px-4 py-1 text-blue-800 hover:bg-blue-500 hover:text-white">تعديل</a>
                            <a href="{{ route('groups.user', $group) }}"
                                class="rounded-full bg-green-400 px-4 py-1 text-green-800 hover:bg-green-500 hover:text-white">مستخدمي المجموعة</a>
                            <button wire:confirm="Are you sure you want to delete this group?"
                                wire:click="deleteGroup({{ $group }})"
                                class="rounded-full bg-red-400 px-4 py-1 text-red-800 hover:bg-red-500 hover:text-white">حذف</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="bg-white p-4">{{ $groups->links() }}</div>
    </div>

    <div class="mt-8">
        <a href="{{ route('groups.create') }}"
            class="rounded-lg border border-green-500 bg-green-500 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-green-700 hover:bg-green-700 focus:ring focus:ring-green-200 disabled:cursor-not-allowed disabled:border-green-300 disabled:bg-green-300">
            اضافة مجموعة
        </a>
    </div>

</div>
