<div>
    <x-status />
    <div class="mb-5 text-2xl font-bold">مستخدمون المجموعة "{{ $group->name}}"</div>
     <div class="mt-5" style="margin-right: 520px; margin-bottom:20px;">
        <a href="{{ route('groups.index') }}"
            class="rounded-lg border border-blue-500 bg-blue-500 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-blue-700 hover:bg-blue-700 focus:ring focus:ring-blue-200 disabled:cursor-not-allowed disabled:border-blue-300 disabled:bg-blue-300">
            الرجوع للخلف
        </a>
    </div>
    <div class="max-w-2xl overflow-hidden rounded-lg border border-gray-200 shadow-md">
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500" style="text-align: center;">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-400">الإسم</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-400">البريد الإلكتروني</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-400">الإجراءات</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @foreach ($groupUsers as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $user->name }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $user->email }}</td>
                        <td class="flex justify-end gap-4 px-6 py-4 font-medium">
                            <button wire:confirm="هل أنت متأكد من حذف هذا المستخدم من المجموعة؟"
                                wire:click="deleteGroupUser({{$group}},{{ $user }})"
                                class="rounded-full bg-red-400 px-4 py-1 text-red-800 hover:bg-red-500 hover:text-white">حذف</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="bg-white p-4">{{ $groupUsers->links() }}</div>
    </div>

    <div class="mt-8">
        <a href="{{ route('groups.createUser',$group) }}"
            class="rounded-lg border border-green-500 bg-green-500 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-green-700 hover:bg-green-700 focus:ring focus:ring-green-200 disabled:cursor-not-allowed disabled:border-green-300 disabled:bg-green-300">
            اضافة مستخدم
        </a>
    </div>

</div>
