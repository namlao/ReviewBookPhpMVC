
Test class BaseModel


        $book = $this->model("test")->getAll()->execute();

        $test = $this->model("test")->getById(5);

        $test = $this->model("test")->getAll()->where([
            'Author = Adam Khoo'
        ])->execute();
        
        $test = $this->model("test")->add([
            'name' => 'abc',
            'abc' => 'sdv'
        ]);

        $testData = [
            'name' => 'acsfgf'
            // other fields to update
        ];
        $test = $this->model("test")->update(2, $testData);

        $test = $this->model("test")->deleteId(1);