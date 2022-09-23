<x-forms::field-wrapper :id="$getId()" :label="$getLabel()" :label-sr-only="$isLabelHidden()" :helper-text="$getHelperText()" :hint="$getHint()"
	:hint-icon="$getHintIcon()" :required="$isRequired()" :state-path="$getStatePath()">

	<div x-data="{ state: $wire.entangle('{{ $getStatePath() }}').defer }">
		{{-- {{ $employee_id }} --}}
		{{-- {{ $evaluate(fn($get) => $get('activity_name')) }} --}}
		<div id="dvPrint"
			style="flex border-collapse  max-w-8xl print:block print:w-[220mm] print:h-[297mm] print:max-w-[220mm] print:max-h-[297mm]">
			<div class="grid border-collapse grid-cols-8 border-4 border-black">

				<div class="col-span-6 border border-black">
					<div class="flex min-w-full place-items-center justify-between">
						<div class="ml-1 mt-1 flex">
							<div class="my-auto flex flow-root">
								<div class="mr-2 inline-block">
									<img src="http://sksu.edu.ph/wp-content/uploads/2020/09/512x512-1.png" alt="sksu logo"
										class="mx-auto h-full w-14 object-scale-down">
									<span class="print:text-8 text-center text-xs text-black">SKSU Works for Success!</span>
									{{-- <span class="text-xs font-bold text-center text-black"> ISO 9001:2015</span> --}}
								</div>
							</div>
							<div class="flex place-items-center">
								<div class="ext-left">
									<span class="block text-sm font-bold uppercase text-black">Republic of the Philippines</span>
									<span class="block text-sm font-bold uppercase text-green-600">SULTAN KUDARAT STATE
										UNIVERSITY</span>
									<span class="block text-sm text-black">ACCESS, EJC Montilla, 9800 City of
										Tacurong</span>
									<span class="block text-sm text-black">Province of Sultan Kudarat</span>
								</div>
							</div>
						</div>
						<div class="flex">
							<div class="m-3 text-center">

								<img class="h-auto w-12"
									src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $evaluate(fn($get) => $get('tracking_number')) }}"
									alt="shet">
								<span
									class="flex justify-center text-xs font-normal">{{ $evaluate(fn($get) => $get('tracking_number')) }}</span>
							</div>

						</div>
					</div>
					<div class="min-w-full border-t-4 border-black text-center">
						<span class="text-md mx-auto font-serif font-extrabold uppercase text-black">Disbursement
							Voucher</span>
					</div>
				</div>

				<div class="col-span-2 grid grid-rows-2 border border-black">
					<div class="row-span-1 border-l border-b border-black">
						<span class="print:text-12 mx-auto ml-1 font-serif text-xs font-extrabold capitalize text-black">
							fund cluster:
						</span>
					</div>
					<div class="row-span-1 border-l border-black pb-6">
						<p class="print:text-12 mx-auto ml-1 font-serif text-xs font-extrabold capitalize text-black">
							date
						</p>
						<p class="print:text-12 mx-auto ml-1 font-serif text-xs font-extrabold text-black">
							DV No.
						</p>
					</div>
				</div>

				<div class="col-span-8 flex min-w-full items-start border-t-2 border-black font-serif">
					<div class="flex h-full border-r-2 border-black px-2 py-1 text-center">
						<span class="text-sm font-extrabold">Mode of Payment</span>
					</div>
					@php
						$mop = $evaluate(fn($get) => $get('mode_of_payment'));
						
					@endphp
					<div class="ml-10 flex space-x-2 py-1">
						<div class="relative flex items-start">
							<div class="flex h-5 items-center">
								@if ($mop == 'MD5')
									<input id="comments" aria-describedby="comments-description" name="comments" type="checkbox"
										class="h-4 w-4 border-black text-primary-500 focus:ring-primary-500" readonly disabled checked>
								@else
									<input id="comments" aria-describedby="comments-description" name="comments" type="checkbox"
										class="h-4 w-4 border-black text-primary-500 focus:ring-primary-500" readonly disabled>
								@endif

							</div>
							<div class="ml-1 text-sm">
								<label class="font-medium text-black">MD5</label>

							</div>
						</div>
						<div class="relative flex items-start">
							<div class="flex h-5 items-center">
								@if ($mop == 'Commercial Check')
									<input id="candidates" aria-describedby="candidates-description" name="candidates" type="checkbox"
										class="h-4 w-4 border-black text-primary-500 focus:ring-primary-500" readonly disabled checked>
								@else
									<input id="candidates" aria-describedby="candidates-description" name="candidates" type="checkbox"
										class="h-4 w-4 border-black text-primary-500 focus:ring-primary-500" readonly disabled>
								@endif

							</div>
							<div class="ml-1 text-sm">
								<label class="font-medium text-black">Commercial Check</label>

							</div>
						</div>
						<div class="relative flex items-start">
							<div class="flex h-5 items-center">
								@if ($mop == 'ADA')
									<input id="offers" aria-describedby="offers-description" name="offers" type="checkbox"
										class="h-4 w-4 border-black text-primary-500 focus:ring-primary-500" readonly disabled checked>
								@else
									<input id="offers" aria-describedby="offers-description" name="offers" type="checkbox"
										class="h-4 w-4 border-black text-primary-500 focus:ring-primary-500" readonly disabled>
								@endif

							</div>
							<div class="ml-1 text-sm">
								<label class="font-medium text-black">ADA</label>

							</div>
						</div>
						<div class="relative flex items-start">
							<div class="flex h-5 items-center">
								@if ($mop == 'Others')
									<input id="offers" aria-describedby="offers-description" name="offers" type="checkbox"
										class="h-4 w-4 border-black text-primary-500 focus:ring-primary-500" readonly disabled checked>
								@else
									<input id="offers" aria-describedby="offers-description" name="offers" type="checkbox"
										class="h-4 w-4 border-black text-primary-500 focus:ring-primary-500" readonly disabled>
								@endif

							</div>
							<div class="ml-1 text-sm">
								<label class="font-medium text-black">Others (Please Specify):</label>

							</div>
						</div>
						@if ($mop == 'Others')
							<div class="relative flex items-start">

								<div class="ml-1 text-sm">
									<span class="font-medium text-black">{{ $evaluate(fn($get) => $get('other_reason')) }}</span>
								</div>
							</div>
						@endif
					</div>
				</div>

				<div class="col-span-8 flex min-w-full items-start border-t-2 border-black font-serif">

					<div class="flex h-full border-r-2 border-black px-2 py-1 text-center">
						<span class="my-auto text-sm font-extrabold">Payee</span>
					</div>
					@php
						$employee_details;
						if ($evaluate(fn($get) => $get('employee_id')) != null) {
						    $employee_details = \App\Models\Employee_information::findOrFail($evaluate(fn($get) => $get('employee_id')));
						}
					@endphp
					<div class="flex h-full w-1/2 border-r-2 border-black text-left">
						<span class="print:text-10 text-serif my-auto flex pl-2 font-extrabold uppercase">
							{{ isset($employee_details) ? $employee_details->user->name : 'none' }} </span>
					</div>
					<div class="flex h-full w-64 border-r-2 border-black px-2 py-1 text-left">
						<span class="pb-3 text-xs font-extrabold">TIN/Employee No.:</span>
					</div>
					<div class="flex h-full w-60 px-2 py-1 text-left">
						<span class="pb-3 text-xs font-extrabold">ORS/BURS No.:</span>
					</div>

				</div>
				<div class="col-span-8 flex min-w-full items-start border-t-2 border-black font-serif">
					<div class="flex h-full border-r-2 border-black px-2 py-1 text-center">
						<span class="my-auto text-sm font-extrabold">Address</span>
					</div>
				</div>
				{{-- Particulars Heading --}}
				<div class="print:text-12 col-span-8 flex min-w-full items-start border-t-2 border-black font-serif">
					<div class="h-auto w-1/2 border-r-2 border-black text-center">
						Particulars
					</div>
					<div class="h-auto w-64 border-r-2 border-black text-center">
						Responsibility Center
					</div>
					<div class="h-auto w-36 border-r-2 border-black text-center">
						MFO/PAP
					</div>
					<div class="h-auto w-36 text-center">
						Amount
					</div>
				</div>
				<div class="print:text-10 col-span-8 flex min-w-full items-start border-t-2 border-black font-serif">
					<div class="h-44 w-1/2 border-r-2 border-black text-center">
						{{ $evaluate(fn($get) => $get('activity_name')) }}
					</div>
					<div class="h-44 w-64 border-r-2 border-black text-center">
						{{ $evaluate(fn($get) => $get('responsibility_center')) }}
					</div>
					<div class="h-44 w-36 border-r-2 border-black text-center">
						{{ $evaluate(fn($get) => $get('mfo_pap')) }}
					</div>
					<div class="h-44 w-36 text-right">
						{{ $evaluate(fn($get) => $get('amount')) }}
					</div>
				</div>
				<div class="print:text-12 col-span-8 flex min-w-full items-start border-black font-serif">
					<div class="h-auto w-1/2 border-r-2 border-t-2 border-black text-center">
						Amount Due
					</div>
					<div class="flex h-auto w-64 border-r-2 border-black text-center">
						&nbsp
					</div>
					<div class="h-auto w-36 border-r-2 border-black text-center">
						&nbsp
					</div>
					<div class="print:text-10 h-auto w-36 border-t-2 border-black text-right">
						{{ $evaluate(fn($get) => $get('amount')) }}
					</div>
				</div>
				<div class="col-span-8 flex min-w-full items-start border-t-2 border-black font-serif">
					<div class="w-full">
						<div class="row-span-1 flex">
							<div class="print:text-12 border-b border-r border-black px-1 font-extrabold">A.</div>
							<span class="print:text-12 pl-1 font-extrabold">Certified: Expenses/Cash Advance necessary, lawful and incurred
								under my direct supervision.</span>
						</div>
						<div class="row-span-1 mx-auto block text-center">
							@php
								$signatory_details;
								$full_name;
								if ($evaluate(fn($get) => $get('signatory_id')) != null) {
								    $signatory_details = \App\Models\Employee_information::findOrFail($evaluate(fn($get) => $get('signatory_id')));
								    $temp;
								    if (isset($signatory_details)) {
								        # code...
								        $temp = explode(',', $signatory_details->full_name);
								    } else {
								        $temp = ['none'];
								    }
								
								    $full_name = $temp[0];
								}
							@endphp
							<span
								class="print:text-10 font-extrabold uppercase underline">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								{{ isset($full_name) ? $full_name : 'none' }}
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
							<p class="print:text-10 font-extrabold capitalize">
								{{ isset($signatory_details) ? $signatory_details->position->position_desc : 'none' }} <span
									class="lowercase">of</span>
								{{ isset($signatory_details) ? $signatory_details->office->office_name : 'none' }}</p>
						</div>
					</div>
				</div>
				<div class="col-span-8 flex min-w-full items-start border-t-2 border-black font-serif">
					<div class="flex">
						<div class="print:text-12 border-b border-r border-black px-1 font-extrabold">B.</div>
						<span class="print:text-12 pl-1 font-extrabold">Accounting Entry:</span>
					</div>
				</div>
				<div class="print:text-12 col-span-8 flex min-w-full items-start border-t-2 border-black font-serif">
					<div class="h-auto w-1/2 border-r-2 border-black text-center">
						Account Title
					</div>
					<div class="h-auto w-72 border-r-2 border-black text-center">
						UACS Code
					</div>
					<div class="h-auto w-28 border-r-2 border-black text-center">
						Debit
					</div>
					<div class="h-auto w-28 text-center">
						Credit
					</div>
				</div>
				<div class="print:text-12 col-span-8 flex min-w-full items-start border-t-2 border-black font-serif">
					<div class="h-44 w-1/2 border-r-2 border-black text-center">
						&nbsp
					</div>
					<div class="h-44 w-72 border-r-2 border-black text-center">
						&nbsp
					</div>
					<div class="h-44 w-28 border-r-2 border-black text-center">
						&nbsp
					</div>
					<div class="h-44 w-28 text-center">
						&nbsp
					</div>
				</div>
				<div class="print:text-12 col-span-8 flex min-w-full items-start border-t-2 border-black font-serif">
					<div class="w-1/2 border-r-2 border-black">
						<div class="flex">
							<div class="print:text-12 border-b border-r border-black px-1 font-extrabold">C.</div>
							<span class="print:text-12 pl-1 font-extrabold">Certified:</span>
						</div>
					</div>
					<div class="w-1/2 border-r-2 border-black">
						<div class="flex">
							<div class="print:text-12 border-b border-r border-black px-1 font-extrabold">D.</div>
							<span class="print:text-12 pl-1 font-extrabold">Approved for Payment:</span>
						</div>
					</div>

				</div>
				<div class="print:text-12 col-span-8 flex min-w-full items-start border-t-2 border-black font-serif">

					<div class="print:text-8 w-1/2 space-y-1 border-r-2 border-black">
						<div class="mt-1 flex items-center">
							<div class="mx-2 h-3 w-8 border border-black"></div>
							<span>Cash available</span>
						</div>
						<div class="flex items-center">
							<div class="mx-2 h-3 w-8 border border-black"></div>
							<span>Subject to Authority to Debit Account (when applicable)</span>
						</div>
						<div class="mb-1 flex items-center">
							<div class="mx-2 h-3 w-8 border border-black"></div>
							<span>Supporting documents complete and amount claimed proper</span>
						</div>
					</div>
				</div>
				<div class="print:text-12 col-span-8 flex min-w-full items-start border-t-2 border-black font-serif">
					<div class="print:text-8 w-1/2 space-y-1 border-r-2 border-black">
						<div class="flex h-auto w-20 border-r border-black text-center print:h-8 print:w-16">
							<span class="print:text-12 my-auto mx-auto flex">Signature</span>
						</div>
					</div>
					<div class="print:text-8 w-1/2 space-y-1">
						<div class="flex h-auto w-20 border-r border-black text-center print:h-8 print:w-16">
							<span class="print:text-12 my-auto mx-auto flex">Signature</span>
						</div>
					</div>
				</div>
				<div class="print:text-12 col-span-8 flex min-w-full items-start border-t-2 border-black font-serif">
					<div class="print:text-8 flex w-1/2 items-center space-y-1 border-r-2 border-black text-center">
						<div class="flex h-auto w-20 border-r border-black text-center print:h-8 print:w-16">
							<span class="print:text-12 w-full break-words">Printed Name</span>
						</div>
						<span class="print:text-10 my-auto mx-auto flex font-extrabold uppercase">JESHER Y. PALOMARIA</span>
					</div>
					<div class="print:text-8 flex w-1/2 items-center space-y-1 border-r-2 border-black text-center">
						<div class="flex h-auto w-20 border-r border-black text-center print:h-8 print:w-16">
							<span class="print:text-12 w-full break-words">Printed Name</span>
						</div>
						<span class="print:text-10 my-auto mx-auto flex font-extrabold uppercase">SAMSON L. MOLAO</span>
					</div>
				</div>
				<div class="print:text-12 col-span-8 flex min-w-full items-start border-t-2 border-black font-serif">

					<div class="print:text-8 flex w-1/2 space-y-1 border-r-2 border-black text-center">
						<div class="flex shrink-0 h-auto w-20 border-r border-black text-center print:h-8 print:w-16">
							<span class="print:text-12 my-auto mx-auto flex">Position</span>
						</div>

						<div class="h-auto print:h-8 w-full text-center">
							<div class="h-4 w-full border-b border-black">
								<span class="print:text-8 my-auto mx-auto block text-xs font-extrabold uppercase">University Accountant</span>
							</div>
							<div class="h-4 w-full">
								<span class="print:text-8 my-auto mx-auto block text-xs font-extrabold uppercase">Head, Accounting
									Unit/Authorized Representative</span>
							</div>
						</div>
					</div>

					<div class="print:text-8 flex w-1/2 space-y-1 border-r-2 border-black text-center">
						<div class="flex shrink-0 h-auto w-20 border-r border-black text-center print:h-8 print:w-16">
							<span class="print:text-12 my-auto mx-auto flex">Position</span>
						</div>
						<div class="h-auto print:h-8 w-full text-center">
							<div class="h-4 w-full border-b border-black">
								<span class="print:text-8 my-auto mx-auto block text-xs font-extrabold uppercase">University President</span>
							</div>
							<div class="h-4 w-full">
								<span class="print:text-8 my-auto mx-auto block text-xs font-extrabold uppercase">Agency Head/Authorized
									Representative</span>
							</div>
						</div>
					</div>

				</div>
				<div class="print:text-12 col-span-8 flex min-w-full items-start border-t-2 border-black font-serif">
					<div class="print:text-8 w-1/2 space-y-1 border-r-2 border-black">
						<div class="flex h-auto w-20 border-r border-black text-center print:h-8 print:w-16">
							<span class="print:text-12 my-auto mx-auto flex">Date</span>
						</div>
					</div>
					<div class="print:text-8 w-1/2 space-y-1">
						<div class="flex h-auto w-20 border-r border-black text-center print:h-8 print:w-16">
							<span class="print:text-12 my-auto mx-auto flex">Date</span>
						</div>
					</div>
				</div>

				<div class="print:text-12 flex col-span-8 min-w-full items-start border-t-2 border-black font-serif">
					<div class="flex-col w-full">
						<div class="w-full border-b-2 border-black flex">
							<div class="print:text-12 border-r border-black px-1 font-extrabold">E.</div>
							<span class="print:text-12 pl-1 font-extrabold">Receipt of Payment</span>
						</div>
						<div class="w-full border-b-2 border-black flex-row flex">
							<div class="print:text-10 shrink-0 border-r w-20 print:w-20 h-auto border-black px-1 font-extrabold text-xs">Check / ADA No.: </div>
							<div class="h-auto w-1/3 shrink-0 border-r border-black"><div class="h-5"></div></div>
							<div class="print:text-10 border-r w-full h-auto border-black px-1 font-extrabold text-xs">Date: </div>
							<div class="print:text-10 border-r w-full h-auto border-black px-1 font-extrabold text-xs">Bank Name & Account Number</div>
						</div>
					</div>
					<div class="h-full shrink-0 float-left w-1/6 border-l border-black">
						<div class="flex text-left print:text-12">
							JEV No.
						</div>
					</div>
				</div>
				<div class="print:text-12 flex col-span-8 min-w-full items-start border-t-2 border-black font-serif">
					<div class="flex-col w-full">						
						<div class="w-full border-b-2 border-black flex-row flex">
							<div class="print:text-10 shrink-0 border-r w-20 print:w-20 h-auto border-black px-1 font-extrabold text-xs">Signature </div>
							<div class="h-auto w-1/3 shrink-0 border-r border-black"><div class="h-5"></div></div>
							<div class="print:text-10 border-r w-full h-auto border-black px-1 font-extrabold text-xs">Date: </div>
							<div class="print:text-10 border-r w-full h-auto border-black px-1 font-extrabold text-xs">Printed Name:</div>
						</div>
						<div class="w-full">
							<span class="print:text-12 pl-1 font-extrabold">Official Receipt No. & Date/Other Documents</span>
						</div>
					</div>
					<div class="h-full shrink-0 float-left w-1/6 border-l border-black">
						<div class="flex text-left print:text-12">
							Date
						</div>
					</div>
				</div>

			</div>
		</div>
		<button type="button" onclick="printDiv('dvPrint')"
			class="mt-2 inline-flex items-center rounded-md border border-transparent bg-primary-500 px-4 py-2 text-xs font-medium text-white shadow-sm hover:bg-primary-300 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
			<!-- Heroicon name: mini/envelope -->

			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="-ml-1 mr-2 h-5 w-5">
				<path fill-rule="evenodd"
					d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 003 3h.27l-.155 1.705A1.875 1.875 0 007.232 22.5h9.536a1.875 1.875 0 001.867-2.045l-.155-1.705h.27a3 3 0 003-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0018 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM16.5 6.205v-2.83A.375.375 0 0016.125 3h-8.25a.375.375 0 00-.375.375v2.83a49.353 49.353 0 019 0zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 01-.374.409H7.232a.375.375 0 01-.374-.409l.526-5.784a.373.373 0 01.333-.337 41.741 41.741 0 018.566 0zm.807-3.97a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H18a.75.75 0 01-.75-.75V10.5zM15 9.75a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V10.5a.75.75 0 00-.75-.75H15z"
					clip-rule="evenodd" />
			</svg>

			Print Voucher
		</button>
	</div>
	@push('scripts')
		<script>
			function printDiv(divName) {


				var originalContents = document.body.innerHTML;

				var element = document.getElementById("toPrint");

				//element.classList.add("transform");
				//element.classList.add("scale-95");
				var printContents = document.getElementById(divName).innerHTML;


				document.body.innerHTML = printContents;

				window.print();

				document.body.innerHTML = originalContents;


			}
		</script>
	@endpush
</x-forms::field-wrapper>
