<div class="flex flex-col w-full justify-between mt-2">

        <div class="mt-1 p-2">
            <label class="block text-sm mb-1 text-gray-600" for="academic_year_code">kode Tahun Akademik</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="academic_year_code"
                value="{{ old('academic_year_code', $academicYears->academic_year_code ?? '') }}"
                name="academic_year_code" type="text" required placeholder="Kode Tahun Akademmik">
        </div>

        <div class="mt-1 p-2">
            <label class="block text-sm mb-1 text-gray-600" for="start_date">Tahun Awal</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="start_date" name="start_date"
                value="{{ old('start_date', $academicYears->start_date ?? '') }}" type="number" required
                placeholder="Tahun Awal">
        </div>

        <div class="mt-1 p-2">
            <label class="block text-sm mb-1 text-gray-600" for="end_date">Tahun Akhir</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="end_date" name="end_date"
                value="{{ old('end_date', $academicYears->end_date ?? '') }}" type="number" required
                placeholder="Tahun Akhir">
        </div>

        <div class="mt-1 p-2">

            <label class="block text-sm mb-1 text-gray-600" for="is_active">Status </label>

            <label for="" class="inline-flex items-center ml-2">
                <input class="p-2" id="is_active" name="is_active" type="radio"
                    value="{{ isset($is_active) ? old('is_active', $academicYears->is_active) : '1' }}">
                <span class="ml-2">Aktif</span>
            </label>

            <label for="" class="inline-flex items-center ml-2">
                <input class="p-2" id="is_active" name="is_active" type="radio" value="0">
                <span class="ml-2">Tidak Aktif</span>
            </label>
        </div>


</div>

<div class="mt-6 flex justify-end">
    <button class="px-4 py-1 text-white font-light tracking-wider hover:bg-blue-500 transi  bg-gray-900 rounded"
        type="submit">Tambahkan</button>
</div>
