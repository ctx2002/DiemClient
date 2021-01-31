<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\Deserializer;

use Softwarewisdom\Diem\DiemTypes\AccessPath;
use Softwarewisdom\Diem\DiemTypes\AccountAddress;
use Softwarewisdom\Diem\DiemTypes\Script;
use Softwarewisdom\Diem\DiemTypes\StructTag;

class TransactionPayloadDeserializer extends DiemTypeDeserializer implements Deserializer
{

    public function run(): Deserializer
    {
        $index = new VariantIndexDeserializer($this->buffer, $this->counter);
        $caseNumber = $index->run()->value();

        switch ($caseNumber) {
            case 0:
                break;
            case 1:
                $this->load_TransactionPayload__Script();
                break;
            case 2:
                break;
            default:
                throw new \RuntimeException('Unknow variant index ' . $caseNumber);
                break;
        }
    }

    public function load_TransactionPayload__Script()
    {
        $this->counter->containerSizeDecrease();

        $this->counter->containerSizeIncrease();
    }

    public function deserializeScript()
    {
        $this->counter->containerSizeDecrease();
            $script = new Script();
            $script->code = $this->deserializeBytes();
            $script->typeTag = $this->deserialize_vector_TypeTag();
            //deserialize_vector_TransactionArgument
        $this->counter->containerSizeIncrease();
    }

    public function deserialize_vector_TransactionArgument()
    {
        $len = (new Length($this->buffer, $this->counter))->run()->value();
        $typeTag = [];
        for ($i = 0; $i < $len; $i++) {
            $this->DeserializeTransactionArgument();
        }
        return $typeTag;
    }

    public function DeserializeTransactionArgument()
    {
        $index = new VariantIndexDeserializer($this->buffer, $this->counter);
        $caseNumber = $index->run()->value();
        switch ($caseNumber) {
            case 0: break;
            case 1:
                //load_TransactionArgument__U64: OK< FO FROM HERE
                break;
            case 2: break;
            case 3:
                return $this->load_TransactionArgument__Address();
            case 4:
                //load_TransactionArgument__U8Vector
                break;
            case 5: break;
            default:
                throw new \RuntimeException('variant index case mismatch: ' . $caseNumber);
        }
    }

    public function load_TransactionArgument__Address(): AccountAddress
    {
        $this->counter->containerSizeDecrease();
        $acc = (new AccountAddressDeserializer($this->buffer, $this->counter))->run()->value();
        $this->counter->containerSizeIncrease();
        return $acc;
    }

    public function deserialize_vector_TypeTag(): array
    {
        $len = (new Length($this->buffer, $this->counter))->run()->value();
        $typeTag = [];
        for ($i = 0; $i < $len; $i++) {
            $this->deserializeTypeTag();
        }
        return $typeTag;
    }

    public function deserializeTypeTag()
    {
        $index = new VariantIndexDeserializer($this->buffer, $this->counter);
        $caseNumber = $index->run()->value();
        switch ($caseNumber) {
            case 0:
                break;
            case 1:
                break;
            case 2:
                break;
            case 3:
                break;
            case 4:
                break;
            case 5:
                break;
            case 6:
                break;
            case 7:
                //load_TypeTag__Struct
                break;
            default:
                throw new \RuntimeException('Unknow variant index for type tag: ' . $caseNumber);
        }
    }

    public function load_TypeTag__Struct()
    {
        $this->counter->containerSizeDecrease();
            //DeserializeStructTag
        $this->counter->containerSizeIncrease();
    }

    public function deserializeStructTag()
    {
        $this->counter->containerSizeDecrease();
        $structTag = new StructTag();
        $structTag->accountAddress = (
            new AccountAddressDeserializer($this->buffer, $this->counter)
        )->run()->value();
        //DeserializeIdentifier
        $structTag->module = $this->DeserializeIdentifier();
        $structTag->name = $this->DeserializeIdentifier();
        $structTag->typeParams = $this->deserialize_vector_TypeTag();
        //deserialize_vector_TypeTag

        $this->counter->containerSizeIncrease();
    }

    public function DeserializeIdentifier(): string
    {
        $str = '';
        $this->counter->containerSizeDecrease();
        $len = (new Length($this->buffer, $this->counter))->run()->value();
        $bytes = [];

        for ($i = 0; $i < $len; $i++) {
            $bytes[] = $this->buffer->next();
        }

        $string = implode(array_map("chr", $bytes));
        $str = mb_convert_encoding($string, 'utf-8');

        $this->counter->containerSizeIncrease();
        return $str;
    }

    /**
     * @return array<int>
     * **/
    public function deserializeBytes(): array
    {
        $len = (new Length($this->buffer, $this->counter))->run()->value();
        $bytes = [];
        for ($i = 0; $i < $len; $i++) {
            $bytes[] = $this->buffer->next();
        }

        if (count($bytes) < $len) {
            throw new \RuntimeException('no enough script bytes');
        }
        return $bytes;
    }

    protected function writeSet()
    {
        $this->counter->containerSizeDecrease();
            $index = new VariantIndexDeserializer($this->buffer, $this->counter);
            $caseNumber = $index->run()->value();
        switch ($caseNumber) {
            //case 0
        }
        $this->counter->containerSizeIncrease();
    }

    protected function writeDirectSet()
    {
        $this->counter->containerSizeDecrease();

        $this->counter->containerSizeIncrease();
    }

    public function changeSet()
    {
        $this->counter->containerSizeDecrease();
            //DeserializeWriteSet
            //deserialize_vector_ContractEvent
        $this->counter->containerSizeIncrease();
    }

    public function deserializeWriteSet()
    {
        $this->counter->containerSizeDecrease();
            //DeserializeWriteSetMut

        $this->counter->containerSizeIncrease();
    }

    public function deserializeWriteSetMut()
    {
        $this->counter->containerSizeDecrease();
        //DeserializeWriteSetMut

        $this->counter->containerSizeIncrease();
    }

    public function deserialize_vector_tuple2_AccessPath_WriteOp()
    {
        //length, err := deserializer.DeserializeLen()
        $len = (new Length($this->buffer, $this->counter))->run()->value();
        for ($i = 0; $i < $len; $i++) {
            //deserialize_tuple2_AccessPath_WriteOp
        }
    }

    public function deserialize_tuple2_AccessPath_WriteOp()
    {
        $this->deserializeAccessPath();
        //DeserializeWriteOp
    }

    public function deserializeAccessPath(): AccessPath
    {
        return (new AccessPathDeserializer($this->buffer, $this->counter))->run()->value();
    }

    public function deserializeWriteOp()
    {
        $index = new VariantIndexDeserializer($this->buffer, $this->counter);
        $caseNumber = $index->run()->value();
        switch ($caseNumber) {
            case 0:
                return $this->load_WriteOp__Deletion();
            case 1:
                //load_WriteOp__Value
                break;
            default:
                throw new \RuntimeException('Unknow type for WriteOP: ' . $caseNumber);
        }
    }

    public function load_WriteOp__Deletion(): int
    {
        $this->counter->containerSizeDecrease();
        $this->counter->containerSizeIncrease();
        return 0;
    }

    public function load_WriteOp__Value()
    {
    }
}
