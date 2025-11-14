<?php

namespace App\Filament\Resources\Employees\Schemas;

use App\Models\Employee;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use PhpParser\Node\Stmt\Label;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')
                                ->label('First Name')
                                ->required()
                                ->minLength(2)
                                ->maxLength(50),
                TextInput::make('last_name')
                                ->label('Last Name')
                                ->required()
                                ->minLength(2)
                                ->maxLength(50),
                TextInput::make('email')
                                ->label('Email Address')
                                ->required()
                                ->email()
                                ->unique(Employee::class,'email',ignoreRecord:True),
                TextInput::make('phone_no')
                                ->label('Phone Number')
                                ->required()
                                ->tel()
                                ->unique(Employee::class,'phone_no',ignoreRecord:True)
                                ->rules(['required','digits:11','numeric'])
                                ->helperText('Enter a 11 digit phone number'),
                TextInput::make('position')
                                ->label('Job Title')
                                ->required()
                                ->minLength(4)
                                ->maxLength(150),
                TextInput::make('salary')
                                ->label('Salary')
                                ->required()
                                ->numeric()
                                ->minValue(1000)
                                ->maxValue(99999999.99),
            ]);
    }
}
