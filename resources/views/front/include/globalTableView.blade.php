<tr>
    <td>বিভাগ: {{ $prokolpoAreaListAll->division_name }}</td>
    <td>
        জেলা: {{ $prokolpoAreaListAll->district_name }} <br>
        সিটি কর্পোরেশন: {{ $prokolpoAreaListAll->city_corparation_name }}
    </td>
    <td>
        উপজেলা: {{ $prokolpoAreaListAll->upozila_name }} <br>
        থানা: {{ $prokolpoAreaListAll->thana_name }} <br>
        পৌরসভা: {{ $prokolpoAreaListAll->municipality_name }} <br>
        ওয়ার্ড: {{ $prokolpoAreaListAll->ward_name }}
    </td>
    <td>
        {{ DB::table('project_subjects')->where('id',$prokolpoAreaListAll->prokolpo_type)->value('name')}}
    </td>
    <td>{{ $prokolpoAreaListAll->allocated_budget }}</td>
    <td>{{ $prokolpoAreaListAll->number_of_beneficiaries }}</td>
</tr>
