@extends('layouts.main')

@section('content')
    <div class="content_container">
        <?php
            $nameLabelValue = 'Ho ten:';
            $nameInputType = 'text';
            $nameInputName = 'name';
            $nameInputPlaceholder = 'Enter your name';
        ?>
        <x-form-input
            :inputName="$nameLabelValue"
            :labelValue="$nameLabelValue"
            :inputType="$nameInputType"
            :inputPlaceholder="$nameInputPlaceholder"
        />
    </div>
@endsection
