#include<stdio.h>

int main()
{
	int i;
	for(i=2;i<22;i++)
	{
		printf("$sale->item%d=Input::get('saleItem%d');\n",i,i);
printf("$sale->item%d_qty=Input::get('saleQty%d');\n$sale->item%d_rate=Input::get('saleRate%d')\n",i,i,i,i);
	}
}
