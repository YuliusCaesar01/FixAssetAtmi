<?php

namespace Modules\ManageJenis\Imports;

use App\Models\Jenis;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class JenisImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        // Validate and map Excel row to Jenis model
        return new Jenis([
            'id_kelompok' => $row['id_kelompok'],
            'nama_jenis_yayasan' => $row['nama_jenis_yayasan'],
            'nama_jenis_mikael' => $row['nama_jenis_mikael'] ?? null,
            'nama_jenis_politeknik' => $row['nama_jenis_politeknik'] ?? null,
            'foto_jenis' => $row['foto_jenis'] ?? null,
        ]);
    }

    public function rules(): array
    {
        return [
            'id_kelompok' => [
                'required',
                'exists:kelompoks,id_kelompok'
            ],
            'nama_jenis_yayasan' => [
                'required',
                'unique:jenis,nama_jenis_yayasan'
            ]
        ];
    }

    public function customValidationMessages()
    {
        return [
            'id_kelompok.exists' => 'Kelompok ID tidak valid.',
            'nama_jenis_yayasan.unique' => 'Nama jenis yayasan sudah ada.'
        ];
    }
}