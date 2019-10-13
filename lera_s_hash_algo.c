#include <wchar.h>
#include <stdio.h>
#include <locale.h>
#include <string.h>
#include <stdlib.h>

int K;
char BITS[10000];

int M;
int INTS[1000];


int str_len(char *str)
{
    int i = 0;

    while (str[i])
        i++;
    return (i);
}

char *reverse_string(char *str)
{
    char *new;
    
    int len = str_len(str);
    new = (char*)malloc(len + 1);
    int i = 0;
    for (int h=0; h < 6 - str_len(str); h++)
    {
        new[i++] = ' ';
    }
    while (i < 6)
    {
        new[i] = str[len-1];
        len--;
        i++;
    }
    new[i] = '\0';
    return (new);
}

int count_dig_bin(int a)
{
    int i = 0;
    
    while (a > 0)
    {
        a /= 2;
        i++;
    }
    return i;
}

void int_to_bits(int a)
{
    char *str;

    INTS[M++] = a;
    str = malloc(count_dig_bin(a) + 1);
    int i = 0;
    int dig = 0;
    while (a > 0)
    {
        dig = a % 2;
        str[i++] = dig + 48;
        a /= 2;
    }
    str[i] = '\0';
    int j = 0;
    char *reverse_str;
    reverse_str = reverse_string(str);
    while (j < 6)
        BITS[K++] = reverse_str[j++];
    BITS[K++] = ' ';
}

void to_bit(char *str)
{
    int c;
    while(*str)
    {
        c = 0;
        if (*str >= 'A' && *str <= 'Z')
            c = *str - 64;
        if (*str >= 'a' && *str <= 'z')
            c = *str - 96;
        if (c != 0)
            int_to_bits(c);
        if (*str == ' ')
        {
            printf("\n\n");
            for (int i = 0; i < M-1 ; i++)
                printf ("%6d ", INTS[i]);
            printf("\n");
            printf("\033[1;31m");
            for (int i = 0; i < K-6; i++)
                printf("%c", BITS[i]);
            printf("\033[0m");
            M = 0;
            K = 0;
        }
        str++;
    }
    printf ("\n\n");
    for (int i = 0; i < M; i++)
    {
        printf ("%6d ", INTS[i]);
    }
    printf("\n");
    printf("\033[1;31m");
    for (int i = 0; i < K; i++)
        printf("%c", BITS[i]);
    printf("\033[0m");
    printf("\n");
}

int main(int argc, char **argv)
{
    char str[10000];

    printf("%s", "lera enter word:\n");
    scanf("%s", str);
    to_bit(str);
    return 0;
}
