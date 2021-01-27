<div class="p-4">
    <div>
        <h2 class="text-xl py-2 text-gray-900 font-black">
            Zviera cislo: {{ $animal->animal_number }}
        </h2>
        <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-8">
            <div class="bg-white p-4 rounded shadow border">
                <h2 class="font-bold text-2xl">
                    Zakladne udaje
                </h2>
                <div class="py-2 grid grid-cols-2 gap-2 items-center">
                    <span class="text-lg font-semibold">Pohlavie: </span>
                    <span>{{ $animal->sex }}</span>
                </div>
                <div class="py-2 grid grid-cols-2 gap-2 items-center">
                    <span class="text-lg font-semibold">Datum narodenia: </span>
                    <span>{{ dateFormat($animal->date_of_birth) }}</span>
                </div>
                <div class="py-2 grid grid-cols-2 gap-2 items-center">
                    <span class="text-lg font-semibold">Matka: </span>
                    <span>{{ $animal->mother_number }}</span>
                </div>
                <div class="py-2 grid grid-cols-2 gap-2 items-center">
                    <span class="text-lg font-semibold">Otec: </span>
                    <span>{{ $animal->father_number }}</span>
                </div>
                <div class="py-2 grid grid-cols-2 gap-2 items-center">
                    <span class="text-lg font-semibold">Plemeno: </span>
                    <span>{{ $animal->breed }}</span>
                </div>
                <div class="py-2 grid grid-cols-2 gap-2 items-center">
                    <span class="text-lg font-semibold">Farba: </span>
                    <span>{{ $animal->color }}</span>
                </div>
                <div class="py-2 grid grid-cols-2 gap-2 items-center">
                    <span class="text-lg font-semibold">Vaha pri narodeni: </span>
                    <span>{{ $animal->calving_weight }}</span>
                </div>
                <div class="py-2 grid grid-cols-2 gap-2 items-center">
                    <span class="text-lg font-semibold">Meno telica: </span>
                    <span>{{ $animal->calving_technician }}</span>
                </div>
                <div class="py-2 grid grid-cols-2 gap-2 items-center">
                    <span class="text-lg font-semibold">Zadane do databazy: </span>
                    <span>{{ dateFormat($animal->created_at) }}</span>
                </div>
            </div>
            <div class="bg-white p-4 rounded shadow border">
                {{ $animal->barn->first()->barn_name }}
            </div>
            <div class="bg-white p-4 rounded shadow border">
                <h2 class="font-bold text-xl">
                    Zaznamy inseminacii
                </h2>
                @if ($inseminations->isEmpty())
                    <p class="mt-2 uppercase text-xs">
                        pre toto zviera zatial neexistuje ziaden zaznam inseminacie.
                    </p>
                @else
                    @foreach ($inseminations as $insemination)
                        <div class="p-2 rounded {{ $insemination->insemination_control ? 'bg-red-100' : 'bg-green-100' }} mb-1">
                            Inseminovana 
                            {{ dateFormat($insemination->date_of_insemination) }}
                            inseminoval
                            {{  $insemination->insemination_technician}}
                        </div>
                    @endforeach
                @endif
            </div>
            <div>
                @foreach ($test as $item)
                    <p>
                        <strong>{{ $item->year }}: </strong>
                        <strong>{{ $item->inseminations }}</strong>
                    </p>
                @endforeach
            </div>
            <div>
                {{ $test }}
            </div>
            <div>
                @foreach ($test2 as $date => $inseminations)
                    <h2 class="text-xl font-bold">{{ $date }}</h2>
                    @foreach ($inseminations as $insemination)
                        <div>
                            <span>{{ \Carbon\Carbon::parse($insemination->date_of_insemination)->format('d-m') }}: </span>
                            <span>{{ $insemination->animal_id }}</span>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>
