
	<x-forms::field-wrapper :id="$getId()" :label="$getLabel()" :label-sr-only="$isLabelHidden()" :helper-text="$getHelperText()" :hint="$getHint()"
		:hint-icon="$getHintIcon()" :required="$isRequired()" :state-path="$getStatePath()">
   
		<div x-data="{ state: $wire.entangle('{{ $getStatePath() }}').defer }">
      {{-- {{ $employee_id }} --}}
      {{ $evaluate(fn ($get) => $get('activity_name')) }}
		</div>
	</x-forms::field-wrapper>

